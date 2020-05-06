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

// AdminWord
Route::group(['prefix' => 'admin'], function() {
    Route::get('word', 'Admin\WordController@index');
    Route::get('word/edit', 'Admin\WordController@edit');
    Route::post('word/edit', 'Admin\WordController@update');
    Route::get('word/delete', 'Admin\WordController@delete');
});

// FrontWord
Route::group(['prefix' => 'front'], function() {
    Route::get('word/add', 'Front\WordController@add')->name('add');
    Route::post('word/add', 'Front\WordController@create');
    Route::get('word/a', 'Front\WordController@index');
    Route::get('word/edit', 'Front\WordController@edit');
    Route::post('word/edit', 'Front\WordController@update');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('categories', 'Front\CategoriesController@categories')->name('categories');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('flashcard', 'Front\FlashCardController@flashcard')->name('flashcard');
});

Auth::routes();

Route::get('/', 'Front\HomeController@index')->middleware('auth')->name('/');

