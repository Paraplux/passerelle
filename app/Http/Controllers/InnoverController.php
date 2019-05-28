<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InnoverController extends Controller
{
    public function index()
    {
        return view('innover');
    }
}
