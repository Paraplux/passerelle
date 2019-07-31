<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keyword;

class InnoverController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index(AccueilRepository $repository) {
        $events = $this->repository->getEvents();

        $articles = $this->repository->getArticles()->where('keyword_id', 4)->shuffle();
        if($articles->count() > 3){
            $articles = $articles->slice(0, 3);
        }

        
        $keyword = Keyword::where('id', 4)->get()[0];

        return view('innover', [
            'events' => $events,
            'articles' => $articles,
            'keyword' => $keyword,
        ]);
    }
}
