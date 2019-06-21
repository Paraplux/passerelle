<?php

namespace App\Http\Controllers;

use App\Partenaire;

class PartenaireController extends Controller
{
    public function index () 
    {
        $fondateurs = Partenaire::where('type', 'fondateur')->get();
        $signataires = Partenaire::where('type', 'signataire')->get();
        $partenaires = Partenaire::where('type', 'partenaire')->get();

        return view('partenaires', [
            'fondateurs' => $fondateurs,
            'signataires' => $signataires,
            'partenaires' => $partenaires
        ]);
    }

    public function get($id) {
        $data = Partenaire::where('id', $id)->firstOrFail();

        return view('partenaire', [
            'data' => $data
        ]);
    }
}
