<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;

class UsersController extends Controller
{
    function editPassword (\App\User $user)
    {
        return view('editpassword')->with('user',$user);
    }

    function updatepassword(Request $request) {
        $user = Auth::user();

        $validation = Validator::make($request->all(), [
            'oldpass' => 'required|',
            'newpass' => 'required|different:oldpass|confirmed',
        ]);

        if ($validation->fails()) {
          return redirect()->back()->withErrors($validation->errors());
        }

        $user->password = Hash::make($request->newpass);
        $user->save();

        return redirect()->route('details')->with('success_message', 'Your new password is now set!');;
    }
}
