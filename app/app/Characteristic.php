<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
  public function products()
  {
      return $this->morphedByMany('\App\Product', 'characterizable');
  }
  public function users()
  {
      return $this->morphedByMany('\App\User', 'characterizable');
  }
  public function groups()
  {
      return $this->morphedByMany('\App\Condrgroup', 'characterizable');
  }

}
