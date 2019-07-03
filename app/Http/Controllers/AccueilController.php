<?php

namespace App\Http\Controllers;
use App\Event;

class AccueilController extends Controller
{

    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function test ()
    {
        $events = Event::all();
        return view('test', [
            'events' => $events
        ]);
    }

    public function index(AccueilRepository $repository)
    {

        $currentWeather = $this->repository->getWeather();
        $weatherStatus = $this->repository->weatherAnimation($currentWeather['status']);
        $articles = $this->repository->getArticles();
        $formations = $this->repository->getFormations();
        $events = $this->repository->getEvents();

        return view('accueil', [
            'currentWeather' => $currentWeather,
            'weatherStatus' => $weatherStatus,
            'articles' => $articles,
            'formations' => $formations,
            'events' => $events
        ]);
    }
}