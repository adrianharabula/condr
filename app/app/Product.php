<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ean_code'];

    // relatie many to many
    // pentru favorited products
    public function users()
    {
        return $this->belongsToMany('\App\User');
    }

    // relatie one to many
    // un produs are mai multe oferte
    public function offers()
    {
        return $this->hasMany('\App\Offer');
    }

    // relatie one to many
    // un produs apartine unei singure categorii
    public function category()
    {
        return $this->belongsTo('\App\Category');
    }

    // relatie many to many polimorfica
    // pentru a retine caracteristicile
    public function characteristics()
    {
        // hint: access desired values with
        // $characteristic->pivot->charvalue;
        return $this->morphToMany('\App\Characteristic', 'characterizable')
                    ->withPivot('cvalue', 'cvotes');
    }
}
