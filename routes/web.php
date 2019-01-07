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

Route::resource('categories', 'CategoriesController')->only('show')->middleware('auth');

Route::resource('posts', 'PostsController')->only(['show','index'])->middleware('auth');

Route::get('/home', 'PostsController@index')->name('home')->middleware('auth');

Route::resource('/admin', 'AdminController')
    ->only('index')->middleware(['auth','admin']);

Route::resource('/admin/posts', 'AdminPostsController')
    ->only(['index','create',"store","edit","update","destroy"])->middleware(['auth','admin']);

Route::resource('/admin/categories', 'AdminCategoriesController')
    ->only(['index','create',"store","edit","update","destroy"])->middleware(['auth','admin']);

