<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

use App\Services\UploadFile;

use App\Faq;
use App\Tag;
use App\User;
use App\Fiche;
use App\Label;
use App\FicheLabel;
use App\Article;
use App\Secteur;
use App\Structure;
use App\ArticleTag;
use App\Partenaire;
use App\Event;
use App\Question;
use App\Keyword;
use App\Contenu;


class AdministrationController extends Controller
{

    public function __construct(AdministrationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {

        if(Auth::check()) {
            if(Auth::user()->role === 'master') {
                return redirect('/governator/master');
            } else if(Auth::user()->role === 'manager') {
                return redirect('/governator/manager');
            }
        }

        return view('admin.connexion');
    }

    public function connexion()
    {
        $user = User::where('login', request('login'))
                    ->orWhere('mail', request('login'))
                    ->first();

        if($user) {
            if(password_verify(request('password'), $user->password)) {
                Auth::login($user);
                return back();
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/governator');
    }

    public function manager()
    {
        if(Auth::check()) {
            if(Auth::user()->role === 'master') {
                return redirect('/governator/master');
            } else if(Auth::user()->role === 'manager') {
                return view('admin.manager');
            }
        }
        return view('admin.connexion');
    }

    public function master()
    {
        if(Auth::check()) {
            if(Auth::user()->role === 'master') {
                return view('admin.master');
            } else if(Auth::user()->role === 'manager') {
                return redirect('/governator/manager');
            }
        }
        return view('admin.connexion');
    }

    public function managerCreate()
    {
        $labels = '';
        $structures = '';
        $secteurs = '';
        $tags = '';
        $keywords = '';
        if(request('model') === 'fiche') {
            $model = 'fiche';
            $labels = Label::all();
            $structures = Structure::all();
            $secteurs = Secteur::all();
        } else if(request('model') === 'article') {
            $model = 'article';
            $tags = Tag::all();
            $keywords = Keyword::all();
        } else if(request('model') === 'event') {
            $model = 'event';
            $structures = Structure::all();
        }


        return view('admin.manager.create', [
            'model' => $model,
            'labels' => $labels,
            'structures' => $structures,
            'secteurs' => $secteurs,
            'tags' => $tags,
            'keywords' => $keywords
        ]);
    }

    public function managerList()
    {
        $data = $this->repository->getData(request('model'));

        return view('admin.manager.listing', [
            'data' => $data,
            'model' => request('model'),
        ]);
    }

    public function masterCreate()
    {
        $data = $this->repository->getData(request('model'));


        return view('admin.master.create', [
            'model' => request('model'),
            'data' => $data,
        ]);
    }

    public function masterList()
    {

        $data = $this->repository->getData(request('model'));


        return view('admin.master.listing', [
            'model' => request('model'),
            'data' => $data
        ]);

    }

    public function masterEdit()
    {

        $data = $this->repository->editData(request('model'), request('id'), null);

        return view('admin.master.edit', [
            'id' => request('id'),
            'model' => request('model'),
            'data' => $data
        ]);

    }

    public function masterSave(Request $request)
    {

        

        $data = $this->repository->editData(request('model'), request('id'), $request);
        $data = $data[request('model')];
        if(request('model') === 'partenaire' || request('model') === 'structure') {

            if($request->input('commune_id') === NULL) {
                $newValue = $request->input('commune_edit_value');
                $request->merge(['commune_id' => $newValue]);
            }
        }

        $data->fill($request->input())->save();

        return back();
        
    }

    public function editTheme(Request $request)
    {
        
        if(count($request->file()) > 0) {

            if($request->file('accueil_thumb')) {
                $thumb = new UploadFile($request->file('accueil_thumb')->path());
                if ($thumb->uploaded) {
                    $thumbsha1 = 'thumb_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
                    $thumb->file_new_name_body = $thumbsha1;
                    $thumb->image_resize = true;
                    $thumb->image_x = 1200;
                    $thumb->image_convert = 'jpg';
                    $thumb->image_ratio_y = true;
                    $thumb->Process('../public/images/theme/');
                    $request->request->add(['accueil_thumb' => '/images/theme/' . $thumbsha1 . '.jpg']);

                    if ($thumb->processed) {
                        $thumb->Clean();
                    }
                }
            }

            if($request->file('formations_thumb')) {
                $thumb = new UploadFile($request->file('formations_thumb')->path());
                if ($thumb->uploaded) {
                    $thumbsha1 = 'thumb_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
                    $thumb->file_new_name_body = $thumbsha1;
                    $thumb->image_resize = true;
                    $thumb->image_x = 1200;
                    $thumb->image_convert = 'jpg';
                    $thumb->image_ratio_y = true;
                    $thumb->Process('../public/images/theme/');
                    $request->request->add(['formations_thumb' => '/images/theme/' . $thumbsha1 . '.jpg']);

                    if ($thumb->processed) {
                        $thumb->Clean();
                    }
                }
            }
        }

        $content = Contenu::find(1);
        $content->fill($request->input())->save();

        return back();
        
    }

    public function getPanel (AdministrationRepository $repository)
    {
        $category = request('category');
        $model = request('type');
        $data = $this->repository->getData($model);

        $panel = "admin.$category.$model";
        return view($panel, [
            'data' => $data,
            'model' => $model,
            'category' => $category
        ]);
    }

    public function deleteData(AdministrationRepository $repository)
    {

        $this->repository->deleteData(request('model'), request('id'));

        return back();
    }

    public function editData(AdministrationRepository $repository)
    {
        $labels = '';
        $structures = '';
        $secteurs = '';
        $tags = '';
        if(request('model') === 'partenaire') {
            $model = 'partenaire';

        } else if(request('model') === 'label') {
            $model = 'label';

        } else if(request('model') === 'structure') {
            $model = 'structure';

        } else if(request('model') === 'secteur') {
            $model = 'secteur';

        } else if(request('model') === 'fiche') {
            $model = 'fiche';
            $labels = Label::all();
            $structures = Structure::all();
            $secteurs = Secteur::all();

        } else if(request('model') === 'article') {
            $model = 'article';
            $tags = Tag::all();

        } else if(request('model') === 'event') {
            $model = 'event';
            $structures = Structure::all();

        } else if(request('model') === 'faq') {
            $model = 'faq';

        } else if(request('model') === 'keyword') {
            $model = 'keyword';

        } else if(request('model') === 'engagement') {
            $model = 'engagement';

        } else if(request('model') === 'user') {
            $model = 'user';

        }

        $model = request('model');
        $id = request('id');
        $input = $this->repository->editData($model, $id);

        $panel = "admin.manager.create.$model";
        return view($panel, [
            'model' => $model,
            'labels' => $labels,
            'structures' => $structures,
            'secteurs' => $secteurs,
            'tags' => $tags
        ]);
    }

    public function addUser(Request $request){

        $validatedData = request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'login' => 'required',
            'mail' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'login' => request('login'),
            'mail' => request('mail'),
            'password' => password_hash(request('password'), PASSWORD_BCRYPT),
            'phone' => request('phone'),
            'role' => request('role'),
        ]);

        return back();
    }

    public function addFiche(Request $request)
    {

        $validatedData = request()->validate([
            'name' => 'required',
            'keyword_id' => 'required',
            'content' => 'required',
            'program' => 'required',
            'tools' => 'required',
            'pre_requisite' => 'required',
            'structure_id' => 'required',
            'certification' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'duree' => 'required',
        ]);

        $labels = request('label_id');
        $secteur = request('secteur_id') ?? '0';

        $createdFiche = Fiche::create([
            'name' => request('name'),
            'keyword_id' => request('keyword_id'),
            'secteur_id' => $secteur,
            'content' => request('content'),
            'program' => request('program'),
            'tools' => request('tools'),
            'pre_requisite' => request('pre_requisite'),
            'structure_id' => request('structure_id'),
            'certification' => request('certification'),
            'date_start' => request('date_start'),
            'date_end' => request('date_end'),
            'duree' => request('duree'),
        ]);

        if(!is_array($labels)) {
            FicheLabel::create([
                'fiche_id' => $createdFiche->id,
                'label_id' => $labels
            ]);
        } else {
            foreach($labels as $label) {
                FicheLabel::create([
                    'fiche_id' => $createdFiche->id,
                    'label_id' => $label
                ]);
            }
        }

        return back();
    }

    public function addArticle()
    {

        $validatedData = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'thumb_1' => 'required',
            'keyword_id' => 'required',
        ]);

        $userTags = request('tags');

        $thumb1 = new UploadFile(request('thumb_1')->path());
        if ($thumb1->uploaded) {
            $thumb1sha1 = 'thumb1_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $thumb1->file_new_name_body = $thumb1sha1;
            $thumb1->image_resize = true;
            $thumb1->image_x = 400;
            $thumb1->image_convert = 'jpg';
            $thumb1->image_ratio_y = true;
            $thumb1->Process('../public/images/articles/thumbs');
            $thumb1link = '/images/articles/thumbs/' . $thumb1sha1 . '.jpg';
            if ($thumb1->processed) {
                $thumb1->Clean();
            }
        }

        if(request('thumb_2') != NULL) {
            $thumb2 = new UploadFile(request('thumb_2')->path());
            if ($thumb2->uploaded) {
                $thumb2sha1 = 'thumb2_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
                $thumb2->file_new_name_body = $thumb2sha1;
                $thumb2->image_resize = true;
                $thumb2->image_x = 400;
                $thumb2->image_convert = 'jpg';
                $thumb2->image_ratio_y = true;
                $thumb2->Process('../public/images/articles/thumbs');
                $thumb2link = '/images/articles/thumbs/' . $thumb2sha1 . '.jpg';
                if ($thumb2->processed) {
                    $thumb2->Clean();
                }
            }
        } else {
            $thumb2link = NULL;
        }

        $createdArticle = Article::create([
            'title' => request('title'),
            'content' => request('content'),
            'author' => request('author'),
            'keyword_id' => request('keyword_id'),
            'thumb_1' => $thumb1link,
            'thumb_2' => $thumb2link
        ]);

        if($userTags) {
            foreach($userTags as $userTag) {
                $createdTag = Tag::create([
                    'name' => $userTag
                ]);

                ArticleTag::create([
                    'article_id' => $createdArticle->id,
                    'tag_id' => $createdTag->id
                ]);
            }
        }


        return back();
    }

    public function addEvent()
    {

        $validatedData = request()->validate([
            'name' => 'required',
            'structure_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);

        $content = request('content') ?? NULL;

        Event::create([
            'name' => request('name'),
            'content' => $content,
            'structure_id' => request('structure_id'),
            'date_start' => request('date_start'),
            'date_end' => request('date_end')
        ]);

        return back();

    }

    public function addLabel()
    {

        $validatedData = request()->validate([
            'name' => 'required',
            'website' => 'required',
            'logo' => 'required'
        ]);

        $logo = new UploadFile(request('logo')->path());
        if ($logo->uploaded) {
            $logosha1 = 'logo_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $logo->file_new_name_body = $logosha1;
            $logo->image_resize = true;
            $logo->image_x = 400;
            $logo->image_convert = 'png';
            $logo->image_ratio_y = true;
            $logo->Process('../public/images/labels/logos');
            $logolink = '/images/labels/logos/' . $logosha1 . '.png';
            if ($logo->processed) {
                $logo->Clean();
            }
        }

        Label::create([
            'name' => request('name'),
            'website' => request('website'),
            'logo' => $logolink
        ]);

        return back();
    }

    public function addStructure()
    {

        $validatedData = request()->validate([
            'name' => 'required',
            'mail' => 'required',
            'website' => 'required',
            'logo' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            'commune_id' => 'required'
        ]);

        $logo = new UploadFile(request('logo')->path());
        if ($logo->uploaded) {
            $logosha1 = 'logo_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $logo->file_new_name_body = $logosha1;
            $logo->image_resize = true;
            $logo->image_x = 400;
            $logo->image_convert = 'png';
            $logo->image_ratio_y = true;
            $logo->Process('../public/images/labels/logos');
            $logolink = '/images/labels/logos/' . $logosha1 . '.png';
            if ($logo->processed) {
                $logo->Clean();
            }
        }

        Structure::create([
            'name' => request('name'),
            'mail' => request('mail'),
            'website' => request('website'),
            'logo' => $logolink,
            'phone' => request('phone'),
            'adress' => request('adress'),
            'commune_id' => intval(request('commune_id'))
        ]);

        return back();
    }

    public function addSecteur()
    {

        $validatedData = request()->validate([
            'name' => 'required'
        ]);

        Secteur::create([
            'name' => request('name')
        ]);

        return back();
    }

    public function addFaq()
    {
        $validatedData = request()->validate([
            'question' => 'required',
            'reponse' => 'required'
        ]);

        Faq::create([
            'question' => request('question'),
            'reponse' => request('reponse')
        ]);

        return back();
    }

    public function addPartenaire()
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'mail' => 'required',
            'website' => 'required',
            'logo' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            'commune_id' => 'required',
        ]);

        $logo = new UploadFile(request('logo')->path());
        if ($logo->uploaded) {
            $logosha1 = 'logo_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
            $logo->file_new_name_body = $logosha1;
            $logo->image_resize = true;
            $logo->image_x = 400;
            $logo->image_convert = 'png';
            $logo->image_ratio_y = true;
            $logo->Process('../public/images/partenaires/logos');
            $logolink = '/images/partenaires/logos/' . $logosha1 . '.png';
            if ($logo->processed) {
                $logo->Clean();
            }
        }

        Partenaire::create([
            'name' => request('name'),
            'mail' => request('mail'),
            'website' => request('website'),
            'logo' => $logolink,
            'phone' => request('phone'),
            'adress' => request('adress'),
            'commune_id' => request('commune_id'),
            'type' => request('type')
        ]);

        return back();
    }
}
