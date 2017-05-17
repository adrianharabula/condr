<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
// use App\Product;

class ProductsController extends Controller
{
  function index() {
     $products = \App\Product::paginate(5);
     //$product = \App\Product::find(1);
     //return $p;
     //$companies = $product->companies;
     //return $companies;

    // $company = $product->company;
    // return $company->name;

     //foreach($companies as $company)
     //	echo $company->name. ' ';

    // foreach($products as $product) {
    //   echo $product->name . ' <br />';
    // }
    return view('products')->with('products',$products);
  }
}
