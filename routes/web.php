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

