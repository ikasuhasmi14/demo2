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

Route::get('/pencils', 'PencilController@index');

Route::post('/pencils', 'PencilController@store');

Route::get('/pencils/{id}/edit', 'PencilController@edit');

Route::put('/pencils/{id}', 'PencilController@update');

Route::delete('/pencils/{pencil}', 'PencilController@destroy');