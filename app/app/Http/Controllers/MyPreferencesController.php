<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyPreferencesController extends Controller
{
  function index() {
    $user = Auth::user();
    return view('mypreferences')->with('user',$user);
  }

}
