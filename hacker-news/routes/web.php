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
Route::post('/', 'ArticlesController@store')->name('storeArticle');

Route::get('home', 'ArticlesController@show')->name('showArticle');
Route::get('article/add', 'ArticlesController@create')->name('createArticle');
Route::get('article/edit/{articleID}', 'ArticlesController@edit')->name('editArticle');
Route::get('article/delete/{articleID}', 'ArticlesController@delete')->name('deleteArticle');
Route::delete('article/delete/{articleID}', 'ArticlesController@destroy')->name('destroyArticle');

//Route::resource('comments', 'CommentsController');
Route::get('comments/{articleID}', 'CommentsController@show')->name('showComments');
Route::post('comments/add/{articleID}', 'CommentsController@create')->name('createComments');
Route::post('comments/{articleID}', 'CommentsController@store')->name('storeComment');
Route::get('comments/edit/{commentID}', 'CommentsController@edit')->name('editComments');
Route::post('comments/update/{commentID}', 'CommentsController@update')->name('updateComments');

Route::get('comments/delete/{commentID}', 'CommentsController@deleteConfrimation')->name('deleteComments');
Route::delete('comments/delete/{commentID}', 'CommentsController@destroy')->name('destoryComments');

Auth::routes();
Route::get('login', 'Controller@showLoginForm')->name('login');
Route::get('register', 'Controller@showRegisterForm')->name('register');
