<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $table = "states";

    public function posts()
    {
        return $this->belongsTo('App\post');
    }
}
