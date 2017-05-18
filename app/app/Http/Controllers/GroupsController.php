<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condrgroup as Groups;
Use Auth;

class GroupsController extends Controller
{
  function index() {
    $groups = Groups::all();
    return view('groups')->with('groups', $groups);
  }

  function viewGroup(\App\Condrgroup $group) {
    return view('viewGroup')->with('group', $group);
  }

  function store(\App\Condrgroup $group, Request $request) {
    Auth::user()->groups()->attach($group);
    $request->session()->flash('status', 'You have joined the group succesfully!');
    return redirect()->route('viewGroup', ['id' => $group->id]);
  }

}
