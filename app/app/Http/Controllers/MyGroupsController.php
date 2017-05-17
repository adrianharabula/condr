<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class MyGroupsController extends Controller
{
  function index() {
    $user = Auth::user();
    $groups = $user->groups()->paginate(5);
    // return $groups;

    //$product = Product::find(5);
    //$characteristics = $product->characteristics;

    //$product->name;

    // $groups = DB::table('condrgroup_user')->paginate(5);

    return view('mygroups')->with('user', $user)
                           ->with('groups', $groups);
  }
}
