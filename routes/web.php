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
    return view('welcome');
});

Auth::routes();

//Add Posts routes 
Route::resource('posts', 'PostController');

//Add Categories routes
Route::resource('categories', 'CategoryController');

//This is named route which makes it easier to use during links 
Route::get('/home', 'HomeController@index')->name('home');
