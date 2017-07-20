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


Route::get('/activities', 'ActivityController@index');


Route::get('/projects', 'ProjectController@index');
Route::get('/projects', 'ProjectController@index');
Route::get('/projects/view/{id}', 'ProjectController@view');
Route::post('/projects/delete/{id}', 'ProjectController@delete');
Route::get('projects/add', 'ProjectController@addView');
Route::post('projects/add', 'ProjectController@add');

Route::get('/profile', 'AccountController@viewAuth');
Route::get('/profile/password', 'AccountController@password');
Route::get('/profile/basic', 'AccountController@basic');
Route::get('/profile/personal', 'AccountController@personal');
Route::get('/profile/password', 'AccountController@password');
Route::get('/members/manage', 'AccountController@manageView');
Route::get('/members/search/{name}', 'AccountController@search');
Route::get('/members/delete/{id}', 'AccountController@deleteView');
Route::get('/members/makeadmin/{id}', 'AccountController@makeadminView');
Route::get('/members/{id}', 'AccountController@view');


Route::post('/profile/basic', 'AccountController@edit_basic');
Route::post('/profile/personal', 'AccountController@edit_personal');
Route::post('/profile/password', 'AccountController@edit_password');
Route::post('/members/delete', 'AccountController@delete');
Route::post('members/makeadmin', 'AccountController@makeadmin');