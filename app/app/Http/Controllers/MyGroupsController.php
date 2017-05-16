<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyGroupsController extends Controller
{
  function index() {
    $user = Auth::user();
    $groups = $user->groups;
    // return $groups;

    //$product = Product::find(5);
    //$characteristics = $product->characteristics;

    //$product->name;


    return view('mygroups')->with('user', $user)
                           ->with('groups', $groups);
  }
}
