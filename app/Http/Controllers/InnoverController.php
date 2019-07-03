<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InnoverController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index(AccueilRepository $repository) {
        $events = $this->repository->getEvents();

        return view('innover', [
            'events' => $events
        ]);
    }
}
