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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Is this line repeated unnecisarily ?
//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/activities', 'ActivityController@index');


Route::get('/projects', 'ProjectController@index');
// Is this line repeated unnecisarily ?
//Route::get('/projects', 'ProjectController@index');
Route::get('/projects/view/{id}', 'ProjectController@view');
Route::post('/projects/delete/{id}', 'ProjectController@delete');
Route::get('projects/add', 'ProjectController@addView');
Route::post('projects/add', 'ProjectController@add');

Route::get('/profile', 'AccountController@viewAuth');
Route::get('/profile/password', 'AccountController@password');
Route::get('/profile/basic', 'AccountController@basic');
Route::get('/profile/personal', 'AccountController@personal');
Route::get('/profile/password', 'AccountController@password');
Route::get('/members/add', 'AccountController@addView');
Route::get('/members/{id}', 'AccountController@view');


Route::post('/profile/basic', 'AccountController@edit_basic');
Route::post('/profile/personal', 'AccountController@edit_personal');
Route::post('/profile/password', 'AccountController@edit_password');


Route::get('/events', 'EventController@index');
Route::get('/events/add','EventController@addView');
Route::post('/events/add','EventController@add');
Route::get('/events/view/{id}','EventController@view');
Route::post('/events/delete/{id}', 'EventController@delete');

Route::get('/courses','CourseController@index');
Route::get('/courses/add','CourseController@addView');
Route::post('/courses/add','CourseController@add');
Route::get('/courses/view/{id}','CourseController@view');
Route::post('/courses/delete/{id}', 'CourseController@delete');
