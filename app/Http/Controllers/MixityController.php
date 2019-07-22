<?php

namespace App\Http\Controllers;

use App\Fiche;
use App\Article;

class MixityController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index(AccueilRepository $repository) {
        $events = $this->repository->getEvents();

        return view('mixity', [
            'events' => $events
        ]);
    }
}

