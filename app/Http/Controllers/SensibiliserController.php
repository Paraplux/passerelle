<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;

class SensibiliserController extends Controller
{
    public function index()
    {
        $partenaires = Partenaire::all()->shuffle();
        return view('sensibiliser', [
            'partenaires' => $partenaires
        ]);
    }
}
