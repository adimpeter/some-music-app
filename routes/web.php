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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.home');

Route::get('/music/create', 'MusicController@create')->name('music.create');
Route::post('/music', 'MusicController@store')->name('music.store');


// route used to test laravel application
Route::get('/test', 'TestController@testGuzzle');
