<?php

namespace App\Http\Controllers;

use App\Fiche;
use App\Article;

class SearchController extends Controller
{
    public function search()
    {
        $formations = Fiche::search(request('query'))->get()->all();
        $articles = Article::search(request('query'))->get()->all();

        return view('results', [
            'query' => request('query'),
            'formations' => $formations,
            'articles' => $articles
        ]);
    }
}
