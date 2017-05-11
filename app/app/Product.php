<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function users() {
      $this->belongsToMany('\App\User');
    }
}
