<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//! TESTING ROUTE
Route::get('/test', 'AccueilController@test');


//* GLOBALS ROUTES

    //? Routes de récupération
    Route::get('/', 'AccueilController@index')->name('/');

    //? Route de recherche
    Route::get('/search', 'SearchController@search');

    //? Route de choix de catégorie pro
    Route::get('/choix-category/pro', 'ChoixCategoryController@pro');
    Route::get('/choix-category/part', 'ChoixCategoryController@part');


//* SENSIBILISER ROUTES

    //? Route de récupération
    Route::get('/sensibiliser', 'SensibiliserController@index')->name('sensibiliser');


//* SE FORMER ROUTES

    //? Routes de récupération
    Route::get('/se-former', 'FormationController@index')->name('se-former');
    Route::get('/formation/{id}', 'FormationController@getFormation');

    //? Route de recherche
    Route::get('/se-former/search', 'FormationController@search');


//* ACCOMPAGNER ROUTES

    //? Route de récupération
    Route::get('/accompagner', 'AccompagnerController@index')->name('accompagner');


//* INNOVER ROUTES

    //? Route de récupération
    Route::get('/innover', 'InnoverController@index')->name('innover');


//* APPRENDRE ROUTES

    //? Route de récupération
    Route::get('/apprendre-autrement', 'ApprendreController@index')->name('apprendre');


//* UTILISER ROUTES

    //? Route de récupération
    Route::get('/utiliser', 'UtiliserController@index')->name('utiliser');


//* PARTAGER ROUTES

    //? Routes de récupération
    Route::get('/partager', 'PartagerController@index')->name('partager');
    Route::get('/partager/{id}', 'PartagerController@getQuestion');

    //? Routes de modification
    Route::post('/partager/add', 'PartagerController@addQuestion');
    Route::post('/partager/{id}', 'PartagerController@addReponse');
    Route::get('/partager/{vote}/{id}', 'PartagerController@vote');


//* ENGAGEMENTS ROUTES

    //? Routes de récupération
    Route::get('/nos-engagements', 'EngagementsController@index');
    

//* PARTENAIRES ROUTES

    //? Route de récupération
    Route::get('/nos-partenaires', 'PartenaireController@index')->name('partenaire');
    Route::get('/groupe-passerelle/{id}', 'PartenaireController@get');


//* ARTICLES ROUTES

    //? Route de récupération
    Route::get('/article/{id}', 'ArticleController@getArticle');


//* CONTACT ROUTES

    //? Route de récupération
    Route::get('/nous-contacter', 'ContactController@index')->name('contact');


//* CARTOGRAPHIE ROUTES

    //? Route de récupération
    Route::get('/cartographie', 'MapController@index')->name('map');


//* ADMINISTRATION ROUTES

    //? Routes de récupération
    Route::get('/governator', 'AdministrationController@index')->name('governator');
    Route::get('/governator/{category}/{type}', 'AdministrationController@getPanel');

    //? Routes de création
    Route::post('/governator/formations/fiche/create', 'AdministrationController@addFiche');
    Route::post('/governator/formations/label/create', 'AdministrationController@addLabel');
    Route::post('/governator/formations/structure/create', 'AdministrationController@addStructure');
    Route::post('/governator/formations/branche/create', 'AdministrationController@addBranche');
    Route::post('/governator/communications/article/create', 'AdministrationController@addArticle');
    Route::post('/governator/communications/faq/create', 'AdministrationController@addFaq');
    Route::post('/governator/communications/partenaire/create', 'AdministrationController@addPartenaire');

    //? Routes de suppression
    Route::get('/governator/delete/{model}/{id}', 'AdministrationController@deleteData');

    //? Routes de modification
    Route::get('/governator/edit/{category}/{model}/{id}', 'AdministrationController@editData');


