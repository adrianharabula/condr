<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyProductsController extends Controller
{
  function index() {
    return view('myproducts');
  }
}
