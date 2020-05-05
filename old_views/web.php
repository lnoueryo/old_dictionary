<?php

use Illuminate\Support\Facades\Route;

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

// Admin
Route::group(['prefix' => 'admin'], function() {
    // Route::get('word/create', 'Admin\WordController@add')->middleware('auth');
    // Route::post('word/create', 'Admin\WordController@create')->middleware('auth');
    Route::get('data', 'Admin\WordController@index')->middleware('auth');
    Route::get('edit', 'Admin\WordController@edit')->middleware('auth');
    Route::post('edit', 'Admin\WordController@update')->middleware('auth');
    Route::get('delete', 'Admin\WordController@delete')->middleware('auth');
});


// Front
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'Front\WordController@home')->name('/');
    Route::get('add', 'Front\WordController@add')->name('add');
    Route::post('add', 'Front\WordController@create');
    Route::get('edit', 'Front\WordController@edit');
    Route::post('edit', 'Front\WordController@update');
    Route::get('delete', 'Front\WordController@delete');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('categories', 'Front\CategoriesController@categories')->name('categories');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('flashcard', 'Front\FlashCardController@flashcard')->name('flashcard');
});
// root を記事一覧にします


Route::resource('word', 'Front\WordController');

Auth::routes();

Route::resource('image', 'ImageController');
