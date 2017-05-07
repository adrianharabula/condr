<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPreferencesController extends Controller
{
  function index() {
    return view('mypreferences');
  }
}
