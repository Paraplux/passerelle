<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use App\Fiche;
use App\Contenu;

class FormationController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index() 
    {
        $events = $this->repository->getEvents();
        $content = Contenu::firstOrFail()->get();

        return view('formations', [
            'events' => $events,
            'content' => $content[0],
        ]);
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
        $content = Contenu::firstOrFail()->get();
        $events = $this->repository->getEvents();

        return view('formations', [
            'query' => request('query'),
            'search' => $search,
            'events' => $events,
            'content' => $content,
        ]);
    }
}
