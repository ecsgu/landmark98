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

Route::get('/', 'TopicController@index');
Route::get('file','FileController@index');
Route::post('file','Filecontroller@doUpload');


Route::resource('Customer','CustomerController');
Route::resource('Account','AccountController');
Route::resource('Advertise','AdvertiseController');
Route::resource('Topic','TopicController');
Route::resource('Comment','CommentController');
Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
