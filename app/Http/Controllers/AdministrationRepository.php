<?php 

namespace App\Http\Controllers;

use App\Fiche;
use App\Label;
use App\Structure;
use App\Branche;
use App\Faq;
use App\Article;
use App\Partenaire;
use App\Commune;
use App\Tag;

class AdministrationRepository {

    public function getData($model) {
        switch ($model) {
            case 'fiche':
                $data['fiches'] = Fiche::all();
                $data['labels'] = Label::all();
                $data['branches'] = Branche::all();
                $data['structures'] = Structure::all();
                break;
            case 'label':
                $data['labels'] = Label::all();
                break;
            case 'structure':
                $data['structures'] = Structure::all();
                $data['communes'] = Commune::where('code_postale', 'LIKE', '02%')
                                         ->orWhere('code_postale', 'LIKE', '59%')
                                         ->orWhere('code_postale', 'LIKE', '60%')
                                         ->orWhere('code_postale', 'LIKE', '62%')
                                         ->orWhere('code_postale', 'LIKE', '80%')
                                         ->orderBy('nom_commune')
                                         ->get();
                break;
            case 'branche':
                $data = Branche::all();
                break;
            case 'article':
                $data['tags'] = Tag::all();
                $data['articles'] = Article::all();
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
                $item = Structure::findOrFail($id);
                $status = $item->delete();
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

    public function editData($model, $id)
    {
        switch ($model) {
            case 'fiche':
                $input = Fiche::findOrFail($id);
                break;
            case 'label':
                
                break;
            case 'structure':
                $input = Structure::findOrFail($id);
                break;
            case 'branche':
                
                break;
            case 'article':
                
                break;
            case 'faq':
                
                break;
            default:
                $input = '';
        }
        return $input;
    }

}