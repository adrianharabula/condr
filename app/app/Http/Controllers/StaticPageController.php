<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function staticPage()
    {
        return view(request()->route()->getName());
    }
}
