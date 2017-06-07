<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Product as Product;


class StatisticsController extends Controller
{
    function index()
    {
      $wanted_products = DB::table('products')->orderBy('views','desc')->take(7)->get();
      $unwanted_products = DB::table('products')->orderBy('views','asc')->take(7)->get();
      $keywords = DB::table('search_analytics')->orderBy('searches')->take(5)->get();

      $wanted_names = $wanted_products->pluck('name');
      $unwanted_names = $unwanted_products->pluck('name');
      $keywords_name = $keywords->pluck('keyword');

      foreach ($wanted_names as $key => $wanted) {
        $wanted_names[$key] = substr($wanted,0,25);
      }

      foreach ($unwanted_names as $key => $unwanted) {
        $unwanted_names[$key] = substr($unwanted,0,25);
      }



      // dd($wanted_names);
      return view('static.statistics', compact('wanted_products'), compact('unwanted_products'), compact('keywords'))
                    ->with('wanted_name', $wanted_names)
                    ->with('wanted_views', $wanted_products->pluck('views'))
                    ->with('unwanted_name', $unwanted_names)
                    ->with('unwanted_views', $unwanted_products->pluck('views'))
                    ->with('keywords_name', $keywords_name)
                    ->with('keywords_value', $keywords->pluck('searches'));
    }
}
