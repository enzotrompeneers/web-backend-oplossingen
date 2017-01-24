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


Route::get('/', 'Controller@home');
Route::get('home', 'Controller@home');

Route::get('article/add', 'Controller@addArticle');
Route::post('article/add', 'Controller@saveArticle');
Route::get('article/edit/{articleID}', 'Controller@editArticle');
Route::get('article}', 'Controller@deleteArticle');
Route::get('article/{articleID}', 'Controller@deleteArticle');
Route::get('article/delete/{articleID}', 'Controller@deleteArticle');


Route::get('comments/{articleID}', 'Controller@showComments');
Route::post('comments/add/{articleID}', 'Controller@addComment');
Route::get('comments/edit/{commentID}', 'Controller@editComment');
Route::get('comments/delete/{commentID}', 'Controller@deleteComment');

Route::get('login', 'Controller@login');
Route::get('register', 'Controller@register');