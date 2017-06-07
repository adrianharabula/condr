<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use \App\Characteristic as Characteristic;
use \App\Product as Product;

class APIController extends Controller
{
    // get all groups
    public function getGroups()
    {
        return \App\Condrgroup::all();
    }
}
