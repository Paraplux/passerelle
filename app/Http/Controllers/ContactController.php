<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;

class ContactController extends Controller
{
    public function index() {

        $fondateurs  = Partenaire::all()->where('type', 'fondateur');
        $signataires = Partenaire::all()->where('type', 'signataire');
        $partenaires = Partenaire::all()->where('type', 'partenaire');

        return view('contact', [
            'fondateurs' => $fondateurs,
            'signataires' => $signataires,
            'partenaires' => $partenaires
        ]);
        
    }
}
