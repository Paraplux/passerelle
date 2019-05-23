<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function getArticle ()
    {
        $id = request('id');

        $article = Article::where('id', $id)->firstOrFail();
        $lastArticles = Article::all();
        
        if($article->thumb_2 === "" || $article->thumb_2 === NULL) {
            return view('article.one', [
                'article' => $article,
                'lastArticles' => $lastArticles
            ]);
        }
        return view('article.two', [
                'article' => $article,
                'lastArticles' => $lastArticles
            ]);
    }
}