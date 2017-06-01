<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ean_code'];

    public function users()
    {
        return $this->belongsToMany('\App\User');
    }

    public function offerer()
    {
        return $this->belongsTo('\App\Offerer');
    }

    public function category()
    {
        return $this->belongsTo('\App\Category');
    }

    public function characteristics()
    {
        return $this->morphToMany('\App\Characteristic', 'characterizable');
    }
}
