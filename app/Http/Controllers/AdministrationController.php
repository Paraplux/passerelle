<?php

namespace App\Http\Controllers;

use App\Services\UploadFile;

use App\Fiche;
use App\Label;
use App\Structure;
use App\Branche;
use App\Faq;
use App\Partenaire;
use App\Article;
use App\Tag;
use App\ArticleTag;

class AdministrationController extends Controller
{

    public function __construct(AdministrationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.index');
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
        $category = request('category');
        $model = request('model');
        $id = request('id');
        $data = $this->repository->getData($model);
        $input = $this->repository->editData($model, $id);

        $panel = "admin.$category.$model";
        return view($panel, [
            'input' => $input,
            'data' => $data,
            'model' => $model,
            'category' => $category
        ]);
    }

    public function addFiche()
    {

        $labels = request('labels');

        $createdFiche = Fiche::create([
            'name' => request('name'),
            'content' => request('content'),
            'program' => request('program'),
            'date_start' => request('date_start'),
            'date_end' => request('date_end'),
            'duree' => request('duree'),
            'structure_id' => request('structure_id'),
            'pre_requisite' => request('pre_requisite'),
            'level' => request('level'),
            'branche_id' => request('branche_id')
        ]);

        return back();
    }

    public function addLabel() 
    {
 
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

    public function addBranche() 
    {
        Branche::create([
            'name' => request('name')
        ]);

        return back();
    }

    public function addArticle() 
    {
        
        $userTags = request('tags');
       
        $createdArticle = Article::create([
            'title' => request('title'),
            'content' => request('content'),
            'author' => request('author'), 
            'thumb_1' => request('thumb_1'), 
            'thumb_2' => request('thumb_2')
        ]);

        foreach($userTags as $userTag) {
            $createdTag = Tag::create([
                'name' => $userTag
            ]);

            ArticleTag::create([
                'article_id' => $createdArticle->id,
                'tag_id' => $createdTag->id
            ]);
        }

        return back();
    }

    public function addFaq()
    {
        Faq::create([
            'question' => request('question'),
            'reponse' => request('reponse')
        ]);

        return back();
    }

    public function addPartenaire() 
    {
        Partenaire::create([
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
}
