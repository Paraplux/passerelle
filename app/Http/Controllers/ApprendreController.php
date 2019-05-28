<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprendreController extends Controller
{
    public function index() 
    {
        return view('apprendre');
    }
}
