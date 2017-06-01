<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offerer extends Model
{
    public function products()
    {
         return $this->hasMany('\App\Product');
    }
}
