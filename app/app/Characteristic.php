<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Characteristic extends Model
{

    public function votes()
    {
        return $this->belongsToMany(CharacteristicVote::class, 'product_characteristic_vote', 'characteristic_id', 'vote_id');
    }
}

