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

        $articles = $this->repository->getArticles()->where('keyword_id', 2)->shuffle();
        if($articles->count() > 3){
            $articles = $articles->slice(0, 3);
        }

        return view('formations', [
            'events' => $events,
            'content' => $content[0],
            'articles' => $articles,
        ]);
    }

    public function getFormation ()
    {
        $id = request('id');
        $fiche = Fiche::where('id', $id)->firstOrFail();

        $sameFiches = Fiche::where('name', $fiche->name)->get();
        
        return view('gabarit-fiche', [
            'fiche' => $fiche,
            'sameFiches' => $sameFiches,
        ]);
    }


    public function search()
    {
        $content = Contenu::firstOrFail()->get();
        $fiches = Fiche::search(request('query'))->get()->all();
        $events = $this->repository->getEvents();

        $articles = $this->repository->getArticles()->where('keyword_id', 2)->shuffle();
        if($articles->count() > 3){
            $articles = $articles->slice(0, 3);
        }

        return view('formations', [
            'query' => request('query'),
            'content' => $content[0],
            'fiches' => $fiches,
            'events' => $events,
            'articles' => $articles,
        ]);
    }
}



/*
Je dois selectionner les structures via les fiches portant le même nom

 */