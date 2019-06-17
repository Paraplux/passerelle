<?php

namespace App\Http\Controllers;

use App\Fiche;
use App\Article;

class SearchController extends Controller
{
    public function search()
    {
        $query = request('query');
        $formations = Fiche::search($query)->get()->all();
        $articles = Article::search($query)->with('tags')->get()->all();

        return view('results', [
            'query' => $query,
            'formations' => $formations,
            'articles' => $articles
        ]);
    }
}
