<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function users() {
      return $this->belongsToMany('\App\User');
    }

	public function company()
    {
         return $this->belongsTo('\App\Company');
    }
}
