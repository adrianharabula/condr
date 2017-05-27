<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacteristicVote extends Model
{
    protected $table = "characteristic_vote";

    protected $fillable = ['votes'];
}
