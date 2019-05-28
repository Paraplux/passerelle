<?php 

namespace App\Http\Controllers;

use App\Fiche;
use App\Label;
use App\Structure;
use App\Branche;
use App\Faq;
use App\Article;
use App\Partenaire;

class AdministrationRepository {

    public function getData($type) {
        switch ($type) {
            case 'fiche':
                $data = Fiche::all();
                break;
            case 'label':
                $data = Label::all();
                break;
            case 'structure':
                $data = Structure::all();
                break;
            case 'branche':
                $data = Branche::all();
                break;
            case 'article':
                $data = Article::all();
                break;
            case 'faq':
                $data = Faq::all();
                break;
            case 'partenaire':
                $data = Partenaire::all();
                break;
            default:
                $data = '';
        }
        
        return $data;
    }

    public function setData()
    {
        switch ($type) {
            case 'fiche':
                $data = Fiche::all();
                break;
            case 'label':
                $data = Label::all();
                break;
            case 'structure':
                $data = Structure::all();
                break;
            case 'branche':
                $data = Branche::all();
                break;
            case 'article':
                $data = Article::all();
                break;
            case 'faq':
                $data = Faq::all();
                break;
            default:
                $data = '';
        }
    }

}