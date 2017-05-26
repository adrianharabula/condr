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


    public function characteristics()
    {
        return $this->morphToMany(Characteristic::class, 'characterizable');
    }


    public function searchableAs()
    {
        return 'products_index';
    }
}
