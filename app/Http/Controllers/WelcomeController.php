<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function about()
    {
        return view('about');
    }
    public function blog()
    {
        return view('blog');
    }
    public function assessment()
    {
        return view('assessment');
    }
}
