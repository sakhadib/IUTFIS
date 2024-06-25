<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home_Controller extends Controller
{
    public function index()
    {
        return view('home');
    }
}
