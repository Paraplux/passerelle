<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccompagnerController extends Controller
{
    public function index() {
        return view('accompagner');
    }
}
