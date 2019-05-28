<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensibiliserController extends Controller
{
    public function index()
    {
        return view('sensibiliser');
    }
}
