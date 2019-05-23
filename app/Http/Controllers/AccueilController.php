<?php

namespace App\Http\Controllers;

class AccueilController extends Controller
{

    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function test ()
    {
        return view('article.two');
    }

    public function index(AccueilRepository $repository)
    {

        $currentWeather = $this->repository->getWeather();
        $weatherStatus = $this->repository->weatherAnimation($currentWeather['status']);
        $articles = $this->repository->getArticles();
        $formations = $this->repository->getFormations();

        return view('accueil', [
            'currentWeather' => $currentWeather,
            'weatherStatus' => $weatherStatus,
            'articles' => $articles,
            'formations' => $formations
        ]);
    }
}