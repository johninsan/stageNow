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
	return view('frontend.homepage.homepage');
});
//pesan routes
Route::get('home/pesan','PesanController@sentUser');
Route::get('pesan/detail/{kode}','PesanController@getDetailMessage');
Route::post('messagePost','PesanController@messagePost');
Route::post('messageReply','PesanController@messageReply');
Route::post('messageAcaraReply','PesanAcaraController@messageAcaraReply');
//web routes
Route::get('home','AcaraFrontendController@index');
Route::get('AboutUs','AcaraFrontendController@AboutUs');
//Route::get('home/wilayah/{id}','AcaraFrontendController@wilayahNasional');
Route::get('kafe','AcaraFrontendController@kafe');
Route::get('eventOrganizer','AcaraFrontendController@eo');
Route::get('acara/{id}','AcaraFrontendController@show');
Route::get('acara/wilayah/{id}','AcaraFrontendController@wilayah');
  //search route
Route::get('/search','AcaraFrontendController@search')->name('search');
	//sort wilayah by ajax
Route::get('/wilayahsort','AcaraFrontendController@wilayahsort');

Route::group(['namespace' => 'Acara'],function (){
	Route::resource('stageNow/acara','acaraController');
	Route::get('stageNow/home','HomeController@index')->name('stageNow.home');
	Route::get('stageNow/musisi','acaraController@musisi')->name('stageNow.musisi');
	Route::resource('pesan','PesanAcaraController');
});

Route::get('login','userController@login');
Route::get('logout','userController@logout');
Route::get('verify/{email}/{verifyToken}', 'PesanController@sendEmailDone')->name('sendEmailDone');
//Route::get('/user/activation/{token}', 'userController@userActivation');

Route::post('loginPost','userController@loginPost');
Route::post('registerPost','userController@registerPost');

//Admin Routes
Route::get('admin/home','AdminController@index')->name('admin.home');
Route::post('adminloginPost','AdminController@adminloginPost');
Route::get('admin-login','AdminController@login');
Route::get('admin/acara','AdminController@status')->name('admin.acara');
Route::get('admin/acara/edit/{id}','AdminController@edit')->name('admin.edit');
Route::post('ubahstatus/{id}','AdminController@ubahstatus');
Route::get('logoutadmin','AdminController@logoutadmin');