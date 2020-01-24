<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //vista de inicio
    public function getHome()
    {
        return view('home');
    }
}
