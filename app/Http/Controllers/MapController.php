<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Structure;
use App\Partenaire;
use App\Contenu;

class MapController extends Controller
{
    public function index () {

        $structures = Structure::with('commune')->get();
        $partenaires = Partenaire::with('commune')->get();
        $content = Contenu::firstOrFail()->get();

        return view('cartographie', [
            'structures' => $structures,
            'partenaires' => $partenaires,
            'content' => $content[0],
        ]);
    }
}
