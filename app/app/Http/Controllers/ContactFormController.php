<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

class ContactFormController extends Controller
{
    public function postFormController(ContactFormRequest $request) {
        dd($request);
    }
}
