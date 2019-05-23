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

//* ACCUEIL ROUTE
Route::get('/', 'AccueilController@index')->name('/ ');

//* SEARCH ROUTE
Route::get('/search', 'SearchController@search');

//* FORMATIONS ROUTES

    //? Routes de récupération
    Route::get('/se-former', 'FormationController@index')->name('se-former');
    Route::get('/formation/{id}', 'FormationController@getFormation');

    //? Route de recherche
    Route::get('/se-former/search', 'FormationController@search');

//* ARTICLES ROUTES

    //? Route de récupération
    Route::get('/article/{id}', 'ArticleController@getArticle');

//* DECOUVRIR ROUUTES

    //? Route de récupération
    Route::get('/decouvrir', 'DecouvrirController@index')->name('decouvrir');

//* FAQ ROUTES

    //? Routes de récupération
    Route::get('/foire-aux-questions', 'FaqController@index')->name('faq');
    Route::get('/foire-aux-questions/{id}', 'FaqController@getQuestion');

    //? Routes de modification
    Route::post('/foire-aux-questions/add', 'FaqController@addQuestion');
    Route::post('/foire-aux-questions/{id}', 'FaqController@addReponse');
    Route::get('/foire-aux-questions/{vote}/{id}', 'FaqController@vote');


//* ADMINISTRATION ROUTES

    //? Routes de récupération
    Route::get('/governator', 'AdministrationController@index');
    Route::get('/governator/{category}/{type}', 'AdministrationController@getPanel');

    //? Routes de création
    Route::post('/governator/formations/fiche/create', 'AdministrationController@addFiche');
    Route::post('/governator/formations/label/create', 'AdministrationController@addLabel');
    Route::post('/governator/formations/structure/create', 'AdministrationController@addStructure');
    Route::post('/governator/formations/branche/create', 'AdministrationController@addBranche');
    Route::post('/governator/communications/article/create', 'AdministrationController@addArticle');
    Route::post('/governator/communications/faq/create', 'AdministrationController@addFaq');