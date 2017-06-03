<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['name'];

    // relatie one to many
    // o oferta apartine unui singur produs
    public function product()
    {
         return $this->belongsTo('\App\Product');
    }
}
