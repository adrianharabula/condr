<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use \App\Characteristic as Characteristic;
use \App\Product as Product;

class AjaxController extends Controller
{
    public function voteCharacteristic(Request $request)
    {
      $characteristic_id = $request->characteristic_id;
      $characterizable_id = $request->characterizable_id;
      $characterizable_type = $request->characterizable_type;

      $characterizable = new $characterizable_type();
      $characterizable = $characterizable::find($characterizable_id);

      $votes = $characterizable->characteristics()->where('characteristic_id', '=', $characteristic_id)->first()->pivot;
      $votes->cvotes = $votes->cvotes + 1;
      $votes->save();

      // TODO: return updated cvote
      // and fetch it in frontend
    }
}
