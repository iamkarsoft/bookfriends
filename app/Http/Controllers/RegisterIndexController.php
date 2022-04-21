<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterIndexController extends Controller
{
    //

    public function __invoke()
    {
        return view('auth.register');
    }
}
