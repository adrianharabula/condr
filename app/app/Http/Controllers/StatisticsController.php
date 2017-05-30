<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Product as Product;


class StatisticsController extends Controller
{
    function index()
    {
      $wanted_products = DB::table('products')->orderBy('views','desc')->take(10)->get();
      $unwanted_products = DB::table('products')->orderBy('views','asc')->take(10)->get();


      return view('static.statistics', compact('wanted_products'), compact('unwanted_products'))
                    ->with('wanted_name', $wanted_products->pluck('name'))
                    ->with('wanted_views', $wanted_products->pluck('views'))
                    ->with('unwanted_name', $unwanted_products->pluck('name'))
                    ->with('unwanted_views', $unwanted_products->pluck('views'));

    }
}
