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

Route::get('/', 'ArticleController@show_all')->name('/');;

Route::get('/home', 'ArticleController@index')->name('home.index')->middleware('auth');
Route::get('/home/{id}', 'ArticleController@show')->name('show');

Route::get('/create', 'ArticleController@create')->name('home.create');
Route::post('/create', 'ArticleController@store')->name('home.store');
Route::get('/home/{id}/edit', 'ArticleController@edit')->name('home.edit');
Route::post('/home/{id}', 'ArticleController@update')->name('home.update');

Route::delete('/home/{id}', 'ArticleController@destroy')->name('home.destroy');

// Verified user
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');



