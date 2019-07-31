<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keyword;

class ApprendreController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index() 
    {
        $events = $this->repository->getEvents();

        $articles = $this->repository->getArticles()->where('keyword_id',5)->shuffle();
        if($articles->count() > 3){
            $articles = $articles->slice(0, 3);
        }

        
        $keyword = Keyword::where('id', 5)->get()[0];
        return view('apprendre', [
            'events' => $events,
            'articles' => $articles,
            'keyword' => $keyword,
        ]);
    }
}
