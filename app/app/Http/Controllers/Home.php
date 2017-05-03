<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class Home extends Controller
{
    public function index(){
      $users = \App\User::limit(30)->get();
      foreach ($users as $user) {
          echo $user->username . '<br />';
      }
    }
}
