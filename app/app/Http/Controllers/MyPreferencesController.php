<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyPreferencesController extends Controller
{
  function index() {
    $user = Auth::user();
    $categories = \App\Category::all();


    $user_characteristics = $user->characteristics;

    // foreach through $user_categories to avoid repetable title
    $user_characteristics_categories = array();
    foreach($user_characteristics as $uc) {
      // if not exists
      if (!in_array($uc->category_id, $user_characteristics_categories)) {
        // add category to array
        $user_characteristics_categories[] = $uc->category_id;
      }
    }

    //return $user_characteristics;

    // no duplicate id here

    //return $user_characteristics_categories;

    return view('mypreferences')->with('user',$user)->with('categories',$categories)->with('ucc',$user_characteristics_categories);
  }

  function addPreferences() {
    return view('addpreferences');
  }
}
