<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;
use App\Contenu;

class ContactController extends Controller
{
    public function index() {

        $fondateurs  = Partenaire::all()->where('type', 'fondateur');
        $signataires = Partenaire::all()->where('type', 'signataire');
        $partenaires = Partenaire::all()->where('type', 'partenaire');
        $content = Contenu::firstOrFail()->get();

        return view('contact', [
            'fondateurs' => $fondateurs,
            'signataires' => $signataires,
            'partenaires' => $partenaires,
            'content' => $content[0],
        ]);
        
    }
}
