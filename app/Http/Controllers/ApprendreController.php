<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprendreController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index() 
    {
        $events = $this->repository->getEvents();

        return view('apprendre', [
            'events' => $events
        ]);
    }
}
