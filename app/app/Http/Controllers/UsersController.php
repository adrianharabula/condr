<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    function editPassword (\App\User $user)
    {
    	return view('editpassword')->with('user',$user);
    }
}
