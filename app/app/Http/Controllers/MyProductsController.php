<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyProductsController extends Controller
{
  function index() {
    $user = Auth::user();
    // return $user->products;
    return view('myproducts')->with('user', $user);
  }
}
