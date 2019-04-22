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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('file','FileController@doUpload');
Route::post('tmpfile','FileController@doUploadtmp');
Route::post('Customer/tmpfile','FileController@doUploadtmp');
Route::post('resetpassword','Auth\ForgotPasswordController@resetPassword');
Route::get('email', function(){
    return view('email/forgot');
});
Route::get('paypal', function(){
    return view('pages/paypal');
});
Route::get('user',function() {
    return view('pages/user');
});
Route::get('post',function() {
    return view('pages/topic');
});
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
