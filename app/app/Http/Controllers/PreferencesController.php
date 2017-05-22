<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferencesController extends Controller
{
  function index() {
    return view('preferences');
  }
  function suggestion(\App\Product $product) {
    return view('suggestion')->with('product', $product);
  }

}
