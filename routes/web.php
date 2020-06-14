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
    return view('app');
});
Route::prefix('auth')->group(function(){
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::post('logout', 'UserController@logout');
    Route::get('init', 'UserController@init');
});

Route::get('categories', 'CategoryController@getCategories');
Route::get('forum/{id}', 'ForumController@getForumById');
Route::post('post/create', 'PostController@create');

Route::prefix('thread')->group(function(){
    Route::get('search/{searchQuery}', 'ThreadController@search');
    Route::post('create', 'ThreadController@create');
    Route::get('/{id}', 'ThreadController@getThreadById');
});

Route::get('init', 'AppController@init');
Route::post('login', 'AppController@login');
Route::post('register', 'AppController@register');
Route::post('logout', 'AppController@logout');

