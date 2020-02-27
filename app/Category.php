<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;

    public function books(){
        return $this->belongsToMany('App\Book');
      }
}
