<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keyword;

class AccompagnerController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index(AccueilRepository $repository) {
        $events = $this->repository->getEvents();

        $articles = $this->repository->getArticles()->where('keyword_id', 3)->shuffle();
        if($articles->count() > 3){
            $articles = $articles->slice(0, 3);
        }

        $keyword = Keyword::where('id', 3)->get()[0];
        return view('accompagner', [
            'events' => $events,
            'articles' => $articles,
            'keyword' => $keyword,
        ]);
    }
}
