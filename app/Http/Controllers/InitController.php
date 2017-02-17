<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitController extends Controller
{
    public function homePage()
    {

        return view('home');
    }
}
