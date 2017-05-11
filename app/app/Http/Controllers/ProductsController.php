<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Product;

class ProductsController extends Controller
{
  function index() {
    // $products = \App\Product::limit(30)->get();
    // foreach($products as $product) {
    //   echo $product->name . ' <br />';
    // }
    return view('products');
  }
}
