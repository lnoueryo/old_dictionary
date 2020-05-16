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
    Route::get('word/index', 'Front\WordController@index');
    Route::get('word/edit', 'Front\WordController@edit');
    Route::post('word/edit', 'Front\WordController@update');
    Route::get('word/delete', 'Front\WordController@delete');

});

// FrontCategories
Route::group(['prefix' => 'front'], function() {
    Route::get('categories', 'Front\CategoriesController@categories')->name('categories');
});

// FrontFlashCard
Route::group(['prefix' => 'front'], function() {
    Route::get('flashcard', 'Front\FlashCardController@flashcard')->name('flashcard');
});

// FrontContact
Route::group(['prefix' => 'front'], function() {
    Route::get('contact/add', 'Front\ContactController@add')->name('contact');
    Route::post('contact/add', 'Front\ContactController@create');
});


Auth::routes();

Route::get('/', 'Front\HomeController@index')->middleware('auth')->name('/');
Route::get('profile', 'Front\HomeController@profile')->name('profile');

// mail
// Route::get('sample/mailable/preview', function () {
//     return new App\Mail\SampleNotification();
//   });
//   Route::get('sample/mailable/send', 'SampleController@SampleNotification');

Route::get('/mailsend', 'SampleController@send');

// 練習
Route::get('practice', 'PracticeController@index');

// mail_pra
Route::get('/contact', 'Front\ContactController@form')->name('contact');
Route::post('/contact', 'Front\ContactController@send')->name('contact.send');
Route::get('/contact/result', 'Front\ContactController@result')->name('front.contact.result');
