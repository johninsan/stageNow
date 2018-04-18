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
 Route::get('home','AcaraFrontendController@index');
  Route::get('kafe','AcaraFrontendController@kafe');
  Route::get('eventOrganizer','AcaraFrontendController@eo');
 Route::get('acara/{id}','AcaraFrontendController@show');

Route::group(['namespace' => 'Acara'],function (){
    //Tag Routes
    Route::resource('stageNow/acara','acaraController');
    Route::get('stageNow/home','HomeController@index')->name('stageNow.home');
    Route::get('stageNow/musisi','acaraController@musisi')->name('stageNow.musisi');
});

Route::get('login','userController@login');
Route::get('logout','userController@logout');

Route::post('loginPost','userController@loginPost');
Route::post('registerPost','userController@registerPost');