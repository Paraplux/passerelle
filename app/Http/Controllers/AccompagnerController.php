<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccompagnerController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index(AccueilRepository $repository) {
        $events = $this->repository->getEvents();

        return view('accompagner', [
            'events' => $events
        ]);
    }
}
