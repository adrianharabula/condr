<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // relatie one to many
    // o categorie are mai multe produse
    // un produs apartine unei singure categorii
    function products()
    {
        return $this->hasMany('\App\Product');
    }
}
