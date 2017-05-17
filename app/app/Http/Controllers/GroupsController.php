<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condrgroup as Groups;

class GroupsController extends Controller
{
  function index() {
    $groups = Groups::all();
    return view('groups')->with('groups', $groups);
  }

  function viewGroup(\App\Condrgroup $group) {
    return view('viewGroup')->with('group', $group);
  }

  function joinGroup(\App\Condrgroup $group) {
    return view('joinGroup')->with('group', $group);
  }

}
