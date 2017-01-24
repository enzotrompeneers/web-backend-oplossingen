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
Route::get('article/edit/{article}', 'Controller@editArticle');

Route::get('comments/{articleID}', 'Controller@addComment');
Route::get('comments/edit/{comment}', 'Controller@editComment');

Route::get('login', 'Controller@login');
Route::get('register', 'Controller@register');