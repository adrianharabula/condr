<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Characteristic extends Model
{
    protected $fillable = ['name', 'values'];

    public function products()
    {
        return $this->morphedByMany('\App\Product', 'characterizable');
        // TODO: maybe add this pivot
        // ->withPivot('charvalue', 'charvotes');
        // Access with
            /*
            foreach ($product->characteristics as $char) {
                echo $char->pivot->charvalue;
                echo $char->pivot->charvotes;
            }
            */
    }

    public function groups()
    {
        return $this->morphedByMany('\App\Condrgroup', 'characterizable');
        // TODO: maybe add this pivot
        // ->withPivot('charvalue', 'charvotes');
        // Access with
            /*
            foreach ($product->characteristics as $char) {
                echo $char->pivot->charvalue;
                echo $char->pivot->charvotes;
            }
            */
    }
}
