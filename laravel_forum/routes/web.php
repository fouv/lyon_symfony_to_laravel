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


Route::get('/', 'PostController@index')->name('postindex');


Route::group(['prefix' => 'post', 'as' => 'post.'], function(){
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/show/{id}', 'PostController@show')->name('show');
    Route::get('/create', 'PostController@create')->name('create');
    Route::post('/store', 'PostController@store')->name('store');

    Route::any('/update/{id}', 'PostController@update')->name('update');
    Route::get('/remove/{id}', 'PostController@remove')->name('remove');
});

Route::group(['prefix' => 'comment', 'as' => 'comment.'], function(){
    Route::post('/create', 'CommentController@create')->name('create');
    Route::get('/remove/{id}', 'CommentController@remove')->name('remove')->middleware('can:remove,id');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

