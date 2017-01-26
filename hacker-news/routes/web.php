<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('articles', 'ArticlesController');
Route::get('/', 'ArticlesController@show');
Route::post('/', 'ArticlesController@store');
Route::get('home', 'ArticlesController@show');
Route::get('article/add', 'ArticlesController@create');
Route::get('article/edit/{articleID}', 'ArticlesController@edit');
Route::get('article/delete/{articleID}', 'ArticlesController@delete')->name('deleteArticle');
Route::delete('article/delete/{articleID}', 'ArticlesController@destroy')->name('destroyArticle');

Route::get('comments/{articleID}', 'CommentsController@showComments');
Route::post('comments/add/{articleID}', 'CommentsController@addComment');
Route::get('comments/edit/{commentID}', 'CommentsController@editComment');
Route::get('comments/delete/{commentID}', 'CommentsController@deleteComment');

Auth::routes();

Route::get('login', 'Controller@showLoginForm');
Route::get('register', 'Controller@showRegisterForm');
