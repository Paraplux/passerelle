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
                $data['fiches'] = Fiche::all();
                $data['labels'] = Label::all();
                $data['branches'] = Branche::all();
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

    public function deleteData($model, $id)
    {
        switch ($model) {
            case 'fiche':
                $item = Fiche::findOrFail($id);
                $status = $item->delete();
                break;
            case 'label':
                
                break;
            case 'structure':
                
                break;
            case 'branche':
                
                break;
            case 'article':
                
                break;
            case 'faq':
                
                break;
            default:
                $status = false;
        }
        return $status;
    }

}