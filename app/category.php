<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    protected $fillable=['name','parent_id'];

    public function getParent()
    {
        return $this->hasone(category::class,'id','parent_id')->withDefault(['name'=>'--']);
    }
    public function getChild()
    {
        return $this->hasMany(category::class,'parent_id','id');
    }
    public static function get_cat_list()
    {
        $cat_list=array();
        $cat_list[0]='انتخاب سر دسته';
        $cat=Category::where('parent_id',0)->get();
        foreach ($cat as $key=>$value)
        {
            $cat_list[$value->id]=$value->name;
            foreach ($value->getChild as $key2=>$value2)
            {
                $cat_list[$value2->id]=' - '.$value2->name;
                foreach ($value2->getChild as $key3=>$value3)
                {
                    $cat_list[$value3->id]=' - - '.$value3->name;
                }
            }
        }
        return $cat_list;
    }


}
