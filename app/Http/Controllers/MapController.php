<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Structure;
use App\Partenaire;

class MapController extends Controller
{
    public function index () {

        $structures = Structure::with('commune')->get();
        $partenaires = Partenaire::with('commune')->get();

        return view('cartographie', [
            'structures' => $structures,
            'partenaires' => $partenaires
        ]);
    }
}
