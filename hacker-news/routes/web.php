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


Route::get('/', 'ArticlesController@home');
Route::post('/', 'ArticlesController@saveArticle');
Route::get('home', 'ArticlesController@home');

Route::get('article/add', 'ArticlesController@addArticle');
Route::get('article/edit/{articleID}', 'ArticlesController@editArticle');
Route::get('article}', 'ArticlesController@deleteArticle');
Route::get('article/{articleID}', 'ArticlesController@deleteArticle');
Route::get('article/delete/{articleID}', 'ArticlesController@deleteArticle');


Route::get('comments/{articleID}', 'CommentsController@showComments');
Route::post('comments/add/{articleID}', 'CommentsController@addComment');
Route::get('comments/edit/{commentID}', 'CommentsController@editComment');
Route::get('comments/delete/{commentID}', 'CommentsController@deleteComment');

Route::get('login', 'Controller@login');
Route::get('register', 'Controller@register');