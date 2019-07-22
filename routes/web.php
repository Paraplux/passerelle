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
    Route::get('/nos-engagements', 'EngagementsController@index')->name('engagements');
    

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


//? Routes de connexion
    
    Route::auth(); 
    
    Route::post('/governator/connexion', 'AdministrationController@connexion');
    Route::get('/governator/logout', 'AdministrationController@logout');
    
    Route::get('/governator/manager', 'AdministrationController@manager');
    Route::get('/governator/master', 'AdministrationController@master');

    Route::get('/governator/manager/{model}/create', 'AdministrationController@managerCreate');
    Route::get('/governator/manager/{model}/list', 'AdministrationController@managerList');
    

    Route::get('/governator/master/{model}/create', 'AdministrationController@masterCreate');
    Route::get('/governator/master/{model}/list', 'AdministrationController@masterList');
    Route::get('/governator/master/{model}/edit/{id}', 'AdministrationController@masterEdit');
    Route::post('/governator/master/{model}/edit/{id}', 'AdministrationController@masterSave');
    
    Route::get('/governator', 'AdministrationController@index')->name('governator');

    //? Routes de création Manager
    Route::post('/governator/manager/fiche/add', 'AdministrationController@addFiche');
    Route::post('/governator/manager/article/add', 'AdministrationController@addArticle');
    Route::post('/governator/manager/event/add', 'AdministrationController@addEvent');
    
    //? Routes de création Master
    Route::post('/governator/master/partenaire/add', 'AdministrationController@addPartenaire');
    Route::post('/governator/master/label/add', 'AdministrationController@addLabel');
    Route::post('/governator/master/structure/add', 'AdministrationController@addStructure');
    Route::post('/governator/master/secteur/add', 'AdministrationController@addSecteur');
    Route::post('/governator/master/fiche/add', 'AdministrationController@addFiche');
    Route::post('/governator/master/article/add', 'AdministrationController@addArticle');
    Route::post('/governator/master/event/add', 'AdministrationController@addEvent');
    Route::post('/governator/master/faq/add', 'AdministrationController@addFaq');
    Route::post('/governator/master/user/add', 'AdministrationController@addUser');

    //? routes d'édition Master
    Route::post('/governator/master/theme/edit', 'AdministrationController@editTheme');

    //? Routes de suppression
    Route::get('/governator/delete/{model}/{id}', 'AdministrationController@deleteData');

