<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{

    use Searchable;


    public function users()
    {
        return $this->belongsToMany('\App\User');
    }


    public function company()
    {
        return $this->belongsTo('\App\Company');
    }


    public function category()
    {
        return $this->belongsTo('\App\Category');
    }



    public function searchableAs()
    {
        return 'products_index';
    }


    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class, 'product_characteristic_vote', 'product_id', 'characteristic_id');
    }
}
