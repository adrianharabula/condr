<?php

namespace App\Repositories;

use App\Repositories\Products;
use Illuminate\Support\Facades\DB;

class Characteristics
{
    public function values(Characteristics $characteristic) {
        $characterizable = DB::table('characterizables')
                                ->where('characteristic_id', $characteristic->id)
                                // ->where('characterizable_id', $product->id)
                                // ->where('characterizable_type', get_class($product))
                                ->get();
        return $characterizable;
    }
}