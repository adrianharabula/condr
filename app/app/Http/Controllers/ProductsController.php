<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
// use App\Product;

class ProductsController extends Controller
{
  function index() {
     $products = \App\Product::paginate(5);

    return view('products')->with('products',$products);
  }

  function viewProduct(\App\Product $product) {
    return view('viewProduct')->with('product', $product);
  }
}
