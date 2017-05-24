<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condrgroup as Group;
Use Auth;

class GroupsController extends Controller
{
    function index() {
        $groups = Group::all();
        return view('groups')->with('groups', $groups);
    }

    function viewGroup(Group $group) {
        return view('viewGroup')->with('group', $group);
    }

    function store(Group $group, Request $request) {
        if ($exists = Auth::user()->groups->contains($group->id)) {
            $request->session()->flash('message', 'You are already in the group!');
            $request->session()->flash('alert-class', 'alert-danger');
        } else {
            Auth::user()->groups()->syncWithoutDetaching($group);
            $request->session()->flash('message', 'You have joined the group succesfully!');
        }
        return redirect()->route('viewGroup', ['id' => $group->id]);
    }

    function search(Request $request) {
        $name = $request->group_name;
        $groups = Group::search($name)->get();
        return view('groups')->with('groups',$groups);
    }
}