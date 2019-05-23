<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use App\Fiche;

class FormationController extends Controller
{
    public function index ()
    {
        return view('formations');
    }

    public function getFormation ()
    {
        $id = request('id');
        $fiche = Fiche::where('id', $id)->first();
        return view('gabarit-fiche', [
            'fiche' => $fiche
        ]);
    }


    public function search()
    {
        $search = Fiche::search(request('query'))->get()->all();

        return view('formations', [
            'query' => request('query'),
            'search' => $search
        ]);
    }
}
