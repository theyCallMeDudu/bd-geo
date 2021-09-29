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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Home (rota padrão do sistema)
    Route::get('/home', 'HomeController@index')->name('home');

    // Continentes
    Route::get('/continente/index', 'ContinenteController@index')->name('home-continente');
    Route::get('/continente/create', 'ContinenteController@create')->name('create-continente');
    Route::post('/continente/index', 'ContinenteController@store')->name('store-continente');
    Route::get('/continente/edit/{id}', 'ContinenteController@edit')->name('edit-continente');
    Route::put('/continente/update/{id}', 'ContinenteController@update')->name('update-continente');
    Route::put('/continente/{id}', 'ContinenteController@destroy')->name('destroy-continente');

    // Países
    Route::get('/pais/index', 'PaisController@index')->name('home-pais');
    Route::get('/pais/create', 'PaisController@create')->name('create-pais');
    Route::post('/pais/index', 'PaisController@store')->name('store-pais');
    Route::get('/pais/edit/{id}', 'PaisController@edit')->name('edit-pais');
    Route::put('/pais/update/{id}', 'PaisController@update')->name('update-pais');
    Route::put('/pais/{id}', 'PaisController@destroy')->name('destroy-pais');
    Route::get('/pais/{id?}', 'PaisController@show')->name('show-pais');

    // Rota para remover imagem de bandeira
    Route::post('/bandeira/remove', 'PaisController@removeBandeira')->name('remove-bandeira');
    
    // Cidades
    Route::get('/cidade/index', 'CidadeController@index')->name('home-cidade');
    Route::get('/cidade/create', 'CidadeController@create')->name('create-cidade');
    Route::post('/cidade/index', 'CidadeController@store')->name('store-cidade');
    Route::get('cidade/edit/{id}', 'CidadeController@edit')->name('edit-cidade');
    Route::put('/cidade/update/{id}', 'CidadeController@update')->name('update-cidade');
    Route::put('/cidade/{id}', 'CidadeController@destroy')->name('destroy-cidade');
    Route::get('cidade/{id?}', 'CidadeController@show')->name('show-cidade');
    
    // Rota para remover imagem de cartão postal
    Route::post('/postal/remove', 'CidadeController@removePostal')->name('remove-postal');
});




