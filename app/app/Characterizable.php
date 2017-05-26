<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Characterizable extends Model
{
   protected $table='characterizables';

   protected $fillable =['characteristic_values', 'characteristic_votes'];


}
