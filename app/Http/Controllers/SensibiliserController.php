<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;

class SensibiliserController extends Controller
{
    private $repository;

    public function __construct(AccueilRepository $repository) {
        $this->repository = $repository;
    }

    public function index() 
    {
        $partenaires = Partenaire::all()->shuffle();
        $events = $this->repository->getEvents();

        return view('sensibiliser', [
            'events' => $events,
            'partenaires' => $partenaires
        ]);
    }
}
