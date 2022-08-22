<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function activities()
    {
        return view('activities');
    }
    public function chat()
    {
        return view ('chat');
    }
}
