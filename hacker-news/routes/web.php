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
Route::get('article/add', 'Controller@add');
Route::get('article/edit/[0-9]*', 'Controller@edit');
Route::get('comments/[0-9]*', 'Controller@home');