<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class filter extends Model
{
    protected $table='filter';
    public function get_child()
    {
        return $this->hasMany(Filter::class,'parent_id','id')->orderBy('id','ASC');
    }
    public static function get_search_filter($cat_id)
    {
        $array=array();
        $filter=filter::with('get_child')->where(['cat_id'=>$cat_id,'parent_id'=>0])->get();
        if(sizeof($filter)>0)
        {
            $array=$filter;
        }

        return $array;
    }
    public static function get_value($product_id)
    {
        $array=array();
        $filter_value=DB::table('filter_post')->where('product',$product_id)->get();
        foreach ($filter_value as $key=>$value)
        {
            $array_key=$value->filter_id.'_'.$value->value;
            $array[$array_key]=$value->value;
        }
        return $array;

    }
    public static function get_post_filter($id)
    {
        $filters=array();
        $cats=DB::table('cat_posts')->where(['post_id'=>$id])->get();

        foreach ($cats as $cat)
        {
            if(sizeof($filters)==0)
            {
                $filter=filter::with('get_child')->where(['cat_id'=>$cat->cat_id,'parent_id'=>0])->get();
                if(sizeof($filter)>0)
                {
                    $filters=$filter;
                }
            }
        }
        return $filters;
    }
}
