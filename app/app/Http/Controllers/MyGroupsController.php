<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use \App\Condrgroup as Group;

class MyGroupsController extends Controller
{
  function index() {
    $user = Auth::user();
    $groups = $user->groups()->paginate(5);
    return view('mygroups')->with('user', $user)
                           ->with('groups', $groups);
  }
  function delete(Group $group, Request $request) {
    Auth::user()->groups()->detach($group);
    $request->session()->flash('status', 'You have exited the group succesfully!');
    return redirect()->route('viewGroup', ['id' => $group->id]);
  }

}
