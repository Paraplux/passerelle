<?php

namespace App\Http\Controllers;

use App\Partenaire;
use App\Contenu;

class PartenaireController extends Controller
{
    public function index () 
    {
        $fondateurs = Partenaire::where('type', 'fondateur')->get();
        $signataires = Partenaire::where('type', 'signataire')->get();
        $partenaires = Partenaire::where('type', 'partenaire')->get();
        $content = Contenu::firstOrFail()->get();

        return view('partenaires', [
            'fondateurs' => $fondateurs,
            'signataires' => $signataires,
            'partenaires' => $partenaires,
            'content' => $content[0],
        ]);
    }

    public function get($id) {
        $data = Partenaire::where('id', $id)->firstOrFail();

        return view('partenaire', [
            'data' => $data
        ]);
    }
}
