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

// AdminWord
Route::group(['prefix' => 'admin'], function() {
    Route::get('word', 'Admin\WordController@index')->middleware('auth');
    Route::get('word/edit', 'Admin\WordController@edit')->middleware('auth');
    Route::post('word/edit', 'Admin\WordController@update')->middleware('auth');
    Route::get('word/delete', 'Admin\WordController@delete')->middleware('auth');
});

// FrontWord
Route::group(['prefix' => 'front'], function() {
    Route::get('word/add', 'Front\WordController@add');
    Route::post('word/add', 'Front\WordController@create');
    Route::get('/', 'Front\WordController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
