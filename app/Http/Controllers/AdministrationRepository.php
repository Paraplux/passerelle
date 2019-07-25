<?php 

namespace App\Http\Controllers;

use App\Article;
use App\Commune;
use App\Contenu;
use App\Event;
use App\Faq;
use App\Fiche;
use App\Keyword;
use App\Label;
use App\Partenaire;
use App\Question;
use App\Secteur;
use App\Structure;
use App\Tag;
use App\User;

class AdministrationRepository {

    public function getData($model)
    {

        if(request('model') === 'partenaire') {
            $data['partenaire'] = Partenaire::all();

        } else if(request('model') === 'label') {
            $data['label'] = Label::all();

        } else if(request('model') === 'structure') {
            $data['structure'] = Structure::all();

        } else if(request('model') === 'secteur') {
            $data['secteur'] = Secteur::all();

        } else if(request('model') === 'fiche') {
            $data['label'] = Label::all();
            $data['structure'] = Structure::all();
            $data['secteur'] = Secteur::all();
            $data['fiche'] = Fiche::all();

        } else if(request('model') === 'article') {
            $data['article'] = Article::all();
            $data['tag'] = Tag::all();
            $data['keyword'] = Keyword::all();

        } else if(request('model') === 'event') {
            $data['event'] = Event::all();
            $data['structure'] = Structure::all();

        } else if(request('model') === 'faq') {
            $data['faq'] = Faq::all();

        } else if(request('model') === 'question') {
            $data['question'] = Question::all();

        } else if(request('model') === 'keyword') {
            $data['keyword'] = Keyword::all();

        } else if(request('model') === 'engagement') {
            $data['engagement'] = Engagement::all();

        } else if(request('model') === 'user') {
            $data['user'] = User::all();
        } else if(request('model') === 'theme') {
            $data['contenu'] = Contenu::all()[0];
        }

        return $data;
    }

    public function deleteData($model, $id)
    {
        if(request('model') === 'partenaire') {
            $item = Partenaire::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'label') {
            $item = Label::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'structure') {
            $item = Structure::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'secteur') {
            $item = Secteur::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'fiche') {
            $item = Fiche::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'article') {
            $item = Article::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'event') {
            $item = Event::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'faq') {
            $item = Faq::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'question') {
            $item = Question::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'keyword') {
            $item = Keyword::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'engagement') {
            $item = Engagement::findOrFail($id);
            $status = $item->delete();

        } else if(request('model') === 'user') {
            $item = User::findOrFail($id);
            $status = $item->delete();
        }
        
        return $status;
    }

    public function editData($model, $id, $request)
    {
        if(request('model') === 'partenaire') {
            $data['partenaire'] = Partenaire::findOrFail($id);

        } else if(request('model') === 'label') {
            $data['label'] = Label::findOrFail($id);

        } else if(request('model') === 'structure') {
            $data['structure'] = Structure::findOrFail($id);

        } else if(request('model') === 'secteur') {
            $data['secteur'] = Secteur::findOrFail($id);

        } else if(request('model') === 'fiche') {
            $data['label'] = Label::all();
            $data['structure'] = Structure::all();
            $data['secteur'] = Secteur::all();
            $data['fiche'] = Fiche::findOrFail($id);

        } else if(request('model') === 'article') {
            $data['article'] = Article::findOrFail($id);
            $data['tag'] = Tag::all();

        } else if(request('model') === 'event') {
            $data['event'] = Event::findOrFail($id);
            $data['structure'] = Structure::all();

        } else if(request('model') === 'faq') {
            $data['faq'] = Faq::findOrFail($id);

        } else if(request('model') === 'question') {
            $data['question'] = Question::findOrFail($id);

        } else if(request('model') === 'keyword') {
            $data['keyword'] = Keyword::findOrFail($id);

        } else if(request('model') === 'engagement') {
            $data['engagement'] = Engagement::findOrFail($id);

        } else if(request('model') === 'user') {
            $data['user'] = User::findOrFail($id);

        }

        return $data;
    }

}