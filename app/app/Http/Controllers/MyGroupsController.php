<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyGroupsController extends Controller
{
  function index() {
    return view('mygroups');
  }
}
