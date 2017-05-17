<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DetailsController extends Controller
{
  function index() {
  	$user = Auth::user();
    return view('details')->with('user', $user);
  }
}
