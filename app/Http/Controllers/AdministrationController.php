<?php

namespace App\Http\Controllers;

use App\Fiche;
use App\Label;
use App\Structure;
use App\Branche;
use App\Faq;
use App\Article;

class AdministrationController extends Controller
{

    public function __construct(AdministrationRepository $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function getPanel (AdministrationRepository $repository) {
        $category = request('category');
        $type = request('type');
        
        $data = $this->repository->getData($type);
        
        $panel = "admin.$category.$type";
        return view($panel)->with('data', $data);
    }

    public function addFiche()
    {
        Fiche::create([
            'name' => request('name'),
            'content' => request('content'),
            'program' => request('program'),
            'date_start' => request('date_start'),
            'date_end' => request('date_end'),
            'location' => request('location'),
            'pre_requisite' => request('pre_requisite'),
            'level' => request('level'),
            'branche_id' => request('branche_id')
        ]);

        return back();
    }

    public function addLabel() 
    {
        Label::create([
            'name' => request('name'),
            'website' => request('website'),
            'logo' => request('logo')
        ]);

        return back();
    }

    public function addStructure() 
    {
        Structure::create([
            'name' => request('name'),
            'mail' => request('mail'),
            'website' => request('website'), 
            'logo' => request('logo'), 
            'phone' => request('phone'), 
            'adress' => request('adress'), 
            'city' => request('city')
        ]);

        return back();
    }

    public function addBranche() 
    {
        Branche::create([
            'name' => request('name')
        ]);

        return back();
    }

    public function addArticle() 
    {
       
        Article::create([
            'title' => request('title'),
            'content' => request('content'),
            'author' => request('author'), 
            'thumb_1' => request('thumb_1'), 
            'thumb_2' => request('thumb_2')
        ]);

        return back();
    }

    public function addFaq() {
        Faq::create([
            'question' => request('question'),
            'reponse' => request('reponse')
        ]);

        return back();
    }
}
