<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecouvrirController extends Controller
{
    public function index()
    {
        return view('decouvrir');
    }
}
