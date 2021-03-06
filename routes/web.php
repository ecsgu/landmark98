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
Route::get('advertise/verify/{username}/{code}','AdvertiseController@verify');
Route::get('useradvertise','AdvertiseController@showregister');
Route::post('useradvertise','AdvertiseController@register');
Route::get('advertiselogin','AdvertiseController@showlogin');
Route::post('advertiselogin','AdvertiseController@login');
Route::get('advertiselogout','AdvertiseController@logout');	
Route::get('advertiseregister','AdvertiseController@showposition');
Route::post('deleteadvertise','AdvertiseController@deleteadvertise');
Route::post('advertiseregister','AdvertiseController@postnewadvertise');
Route::post('doianhadvertise','AdvertiseController@doianh');
Route::post('advertisethanhtoan','AdvertiseController@thanhtoan');
Route::get('paypal/{id}','AdvertiseController@thanhtoanpaypal');
Route::get('advertiseregister/{position}','AdvertiseController@newadvertise');
Route::get('bank/{id}', 'AdvertiseController@bank');
Route::get('dieukhoan',function(){
	return view('advertise/dieukhoan');
});
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
Route::post('admin/duyetadvertise','WebmasterController@duyetadvertise');
Route::post('admin/xoaadvertise','WebmasterController@xoaadvertise');
Route::post('admin/thanhtoanadvertise','WebmasterController@thanhtoanadvertise');
Route::get('admin/notification','WebmasterController@notification');
Route::post('admin/notification','WebmasterController@postnotification');
Route::post('admin/xoanotification','WebmasterController@xoanotification');
Route::get('admin/forgot','WebmasterController@forgot');
Route::get('admin/revenue','WebmasterController@revenue');
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
