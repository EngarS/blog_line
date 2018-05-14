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
    return view('index');
});

Auth::routes();

//Route::get('/home', 'ArticleController@index')->name('home');
Route::resource('home', 'ArticleController');//->name('article');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Verified user
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');



