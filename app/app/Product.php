<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = "product_id";

    public function users() {
      $this->belongsToMany('\App\User');
    }
}
