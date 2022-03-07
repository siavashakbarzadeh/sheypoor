<?php
namespace App;
use DB;
class Search
{
    protected  $data;

    public function __construct($data)
    {
        $this->data=$data;
    }
    public function get_product()
    {
        //die(var_dump($this->data));
        if(is_array($this->data))
        {
            $array=array();
            $product_filter=array();
            $i=0;
            foreach ($this->data as $key=>$value)
            {
                $filter=$this->check_filter_name($key);
//                var_dump($filter->ename);
                if($filter)
                {
                    $j=0;
                    foreach ($value as $key2=>$value2)
                    {
//                        var_dump($key2.' '.$value2);
                        $get_filter=DB::table('filter')->where(['id'=>$value2])->first();
//                        var_dump($get_filter);
                        if($get_filter)
                        {
                            $parent_id=$get_filter->parent_id;
                            $filter_name=$get_filter->name;
                        }
                        else
                        {
                            $filter_name='';
                            $parent_id='';
                        }
                        $product_filter[$value2]['name']=$filter_name;
                        $product_filter[$value2]['parent_id']=$parent_id;

//                        die(var_dump($product_filter));

                        $row=DB::table('filter_post')->where(['value'=>$value2])->get();
//                        die(var_dump($row));
                        foreach ($row as $key3=>$value3)
                        {
                            $array[$i][$j]=$value3->product;
                            $j++;

                        }



                    }
                    $i++;
               //     var_dump($array);
                }
            }
        }


        $product=$this->product($array,$product_filter);
        return $product;
    }
    public function check_filter_name($enme)
    {
        $row=Filter::where(['ename'=>$enme])->first();
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
    public function product($array,$product_filter)
    {
        $product_id=array();
        var_dump($array);
        if(sizeof($array)>1)
        {
            $product_id=call_user_func_array('array_intersect',$array);
        }
        else
        {
            if(sizeof($array)==1)
            {
                $product_id=$array[0];
            }

        }
        //var_dump($product_id);
        //$product=Post::whereIn('id',$product_id)->get();
        $product=DB::table('posts')
        ->select('*')
        ->whereIn('id', $product_id)
        ->get();
//var_dump($product);
        $array2['product']=$product;
        $array2['filter_id']=$product_filter;
        //var_dump($array2['product']);
        return $array2;

    }

}