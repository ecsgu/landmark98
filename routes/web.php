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
Route::get('index', function(){
    return view('index');
});
Route::post('file','FileController@doUpload');
Route::post('tmpfile','FileController@doUploadtmp');
Route::post('Customer/tmpfile','FileController@doUploadtmp');
Route::post('Customer/file','FileController@doUpload');

Route::post('resetpassword','Auth\ForgotPasswordController@resetPassword');
Route::get('email', function(){
    return view('email/forgot');
});
Route::get('user',function() {
    return view('pages/user');
});
Route::get('post',function() {
    return view('pages/topic');
});
//Route advertise

Route::resource('advertise','AdvertiseController');
Route::get('useradvertise','AdvertiseController@showregister');
Route::post('useradvertise','AdvertiseController@register');
Route::get('advertiselogin','AdvertiseController@showlogin');
Route::post('advertiselogin','AdvertiseController@login');
Route::get('advertiselogout','AdvertiseController@logout');	
Route::get('advertiseregister','AdvertiseController@showposition');
Route::post('advertiseregister','AdvertiseController@postnewadvertise');
Route::get('advertiseregister/{position}','AdvertiseController@newadvertise');
Route::get('bank', 'AdvertiseController@bank');
Route::get('paypal', 'AdvertiseController@paypal');
//route webmaster

Route::get('admin/phanquyen','WebmasterController@indexphanquyen');
Route::post('admin/phanquyen','WebmasterController@phanquyen');
Route::post('admin/xoacmt','WebmasterController@xoacmt');
Route::post('admin/duyetcmt','WebmasterController@duyetcmt');
Route::post('admin/duyetbai','WebmasterController@duyetbai');
Route::post('admin/xoabai','WebmasterController@xoabai');
Route::get('admin/logout','WebmasterController@logout');
Route::post('admin/login','WebmasterController@login');
Route::get('admin/topic','WebmasterController@topic');
Route::get('admin/comment','WebmasterController@comment');
Route::get('admin/advertise','WebmasterController@advertise');
Route::get('admin/notification','WebmasterController@notification');
Route::post('admin/notification','WebmasterController@postnotification');
Route::get('admin/forgot','WebmasterController@forgot');
Route::resource('admin','WebmasterController');
//------------------
Route::resource('Customer','CustomerController',['only' => ['index','store','show','update','edit']]);
Route::resource('Account','AccountController');
Route::post('Topic/{id}','TopicController@topicjson');
Route::resource('Topic','TopicController');
Route::resource('Comment','CommentController');
Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();

Route::get('home', 'HomeController@index');
