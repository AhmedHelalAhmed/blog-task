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

Route::resource('categories', 'CategoriesController',['except'=> ['index']]);

Route::resource('posts', 'PostsController',['except'=> ['index']]);

Route::get('/home', 'PostsController@index')->name('home');