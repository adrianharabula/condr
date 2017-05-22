<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Characteristic extends Model
{
  public function characterizable()
  {
    return $this->morphTo();
  }

  public function values() {
    $characterizable = DB::table('characterizables')->where('characteristic_id', $this->id)->first();
    return $characterizable->characteristic_values;
  }
  
  public function category()
  {
       return $this->belongsTo('\App\Category');
  }
}
