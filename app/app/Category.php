<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function products() {
      return $this->hasMany('App\Product');
    }
    function characteristics() {
      // test commit
      return $this->hasMany('App\Characteristic')->orderBy('category_id');
    }
}
