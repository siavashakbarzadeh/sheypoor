<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class post extends Model
{
    protected $table='posts';
    protected  $fillable=['title','slug','desc','img','price','phone_number','address'];

    use Sluggable;

    function slugfy($string, $separator = '-')
    {
        $url = trim($string);
        $url = strtolower($url);
        $url = preg_replace('|[^a-z-A-Z\p{Arabic}0-9 _]|iu', '', $url);
        $url = preg_replace('/\s+/', ' ', $url);
        $url = str_replace(' ', $separator, $url);

        return $url;
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function get_cat($id)
    {
        $cat_list = DB::table('cat_posts')->where('post_id',$id)->pluck('category_id','id')->toArray();
        return $cat_list;
    }

    public function path()
    {
        return "/SinglePost/".$this->slug;
    }
    public function categories()
    {
        return $this->belongsToMany('App\category','cat_posts');
    }
    public function states()
    {
        return $this->hasOne('App\state');
    }
    public function scopeSearch($query,$keyword)
    {
        $query->whereHas('categories',function ($query) use ($keyword){
            $query->where('name','LIKE','%'.$keyword.'%');
        })
       ->orWhere('title','LIKE','%'.$keyword.'%')->orWhere('desc','LIKE','%'.$keyword.'%');
        return $query;
    }

}
