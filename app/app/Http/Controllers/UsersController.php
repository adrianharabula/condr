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

    function updatepassword(Request $request)
    {
        $user = Auth::user();

        $error_messages = [
            'old_password' => 'Old password does not match.',
        ];

        $validation = Validator::make($request->all(), [
            'oldpass' => 'required|old_password:' . Auth::user()->password,
            'newpass' => 'required|different:oldpass|confirmed',
        ], $error_messages);

        if ($validation->fails()) {
          return redirect()->back()->withErrors($validation->errors());
        }

        $user->password = Hash::make($request->newpass);
        $user->save();

        return redirect()->route('details')->with('success_message', 'Your new password is now set!');;
    }
}
