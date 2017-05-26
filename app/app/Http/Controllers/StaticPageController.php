<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function staticPage()
    {
        return view('static'.request()->route()->getName());
    }
}
