<?php

namespace App\Http\Controllers;

use App\Partenaire;

class PartenaireController extends Controller
{
    public function index () 
    {
        $partenaires = Partenaire::all();

        return view('partenaires', [
            'partenaires' => $partenaires
        ]);
    }
}
