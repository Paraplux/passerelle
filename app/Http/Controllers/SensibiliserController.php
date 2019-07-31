<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;
use App\Keyword;

class SensibiliserController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index() 
    {
        $events = $this->repository->getEvents();
        
        $articles = $this->repository->getArticles()->where('keyword_id', 1)->shuffle();
        if($articles->count() > 3){
            $articles = $articles->slice(0, 3);
        }

        
        $keyword = Keyword::where('id', 1)->get()[0];

        return view('sensibiliser', [
            'events' => $events,
            'articles' => $articles,
            'keyword' => $keyword
        ]);
    }
}
