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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/projects', 'ProjectController@index');

Route::get('/activities', 'ActivityController@index');

Route::get('/projects', 'ProjectController@index');

Route::get('/projects/view/{id}', 'ProjectController@view');

Route::post('/projects/delete/{id}', 'ProjectController@delete');

Route::get('projects/add', 'ProjectController@addView');

Route::post('projects/add', 'ProjectController@add');

Route::get('/account', 'AccountController@view');