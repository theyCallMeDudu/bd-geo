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

Route::get('/home', 'HomeController@index')->name('home');

// Continentes
Route::get('/continente/index', 'ContinenteController@index')->name('home-continente')->middleware('auth');
Route::get('/continente/create', 'ContinenteController@create')->name('create-continente')->middleware('auth');
Route::post('/continente/index', 'ContinenteController@store')->name('store-continente')->middleware('auth');
Route::get('/continente/edit/{id}', 'ContinenteController@edit')->name('edit-continente')->middleware('auth');
Route::put('/continente/update/{id}', 'ContinenteController@update')->name('update-continente')->middleware('auth');
Route::put('/continente/{id}', 'ContinenteController@destroy')->name('destroy-continente')->middleware('auth');

// Países
Route::get('/pais/index', 'PaisController@index')->name('home-pais')->middleware('auth');
Route::get('/pais/create', 'PaisController@create')->name('create-pais')->middleware('auth');
Route::post('/pais/index', 'PaisController@store')->name('store-pais')->middleware('auth');
Route::get('/pais/edit/{id}', 'PaisController@edit')->name('edit-pais')->middleware('auth');
Route::put('/pais/update/{id}', 'PaisController@update')->name('update-pais')->middleware('auth');
Route::put('/pais/{id}', 'PaisController@destroy')->name('destroy-pais')->middleware('auth');
Route::get('/pais/{id?}', 'PaisController@show')->name('show-pais')->middleware('auth');

// Rota para remover imagem de bandeira
Route::post('/imagem/remove', 'PaisController@removeImagem')->name('remove-imagem')->middleware('auth');

// Cidades
Route::get('/cidade/index', 'CidadeController@index')->name('home-cidade')->middleware('auth');