<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Validator;

class UserSettingsController extends Controller
{

    /**
     * @return $this
     *
     */
    function index()
    {
        return view('user.account')->with('user', auth()->user());
    }


        function getEditPassword()
    {
        return view('user.change-password')->with('user', auth()->user());
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    function postEditPassword(Request $request)
    {
        $user = auth()->user();

        $error_messages = [
            'old_password' => 'Old password does not match.',
        ];

        $validation = Validator::make($request->all(), [
            'oldpass' => 'required|old_password:' . $user->password,
            'newpass' => 'required|different:oldpass|confirmed',
        ], $error_messages);

        if ($validation->fails()) {
          return redirect()->back()->withErrors($validation->errors());
        }

        $user->password = Hash::make($request->newpass);
        $user->save();

        $request->session()->flash('message', 'Your new password is now set!');
        return redirect()->route('my.account.index');
    }
}
