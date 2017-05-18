<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condrgroup extends Model
{

    public function users()
    {
         return $this->belongsToMany('\App\User');
    }
    
    public function characteristics()
    {
        return $this->morphMany('\App\Characteristic', 'characterizable');
    }
}
