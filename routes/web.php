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
    Route::get('word/index', 'Front\WordController@index');
    Route::get('word/add', 'Front\WordController@add');
    Route::post('/keyboard', 'Front\WordController@create');
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
    Route::get('/keyboard', 'Front\HomeController@keyboard')->name('add');
});


// その他
Auth::routes();
Route::get('/', 'Front\HomeController@index')->middleware('auth')->name('/');
Route::get('admin', 'Admin\UserController@home')->middleware('auth')->name('admin');
Route::get('admin/inbox', 'Admin\UserController@inbox')->name('adminInbox');
Route::get('/refresh_captcha', 'Auth\LoginController@refreshCaptcha')->name('refresh');
Route::get('/mailsend', 'SampleController@send');
Route::post('/login/custom', [
    'uses' => 'Auth\MyLoginController@login',
    'as' => 'login.custom'
    ]);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'Front\HomeController@index')->middleware('auth')->name('home');

    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

});





// mail_pra
Route::get('/contact', 'Front\ContactController@form')->name('contact');
Route::post('/contact', 'Front\ContactController@send')->name('contact.send');
Route::get('/contact/result', 'Front\ContactController@result')->name('front.contact.result');


// register mail
Route::get('verification', 'UserController@verification')->name('verification');
Route::post('post/verification', 'UserController@postVerification');
Route::post('post/resend', 'UserController@postResend');
Route::post('/home', 'Auth\ProfileController@update');



// プロフィール
Route::get('profile/user', 'Admin\UserController@profile')->name('dashboard');
Route::get('profile/user/detail', 'Admin\UserController@detail');
Route::get('profile/user/edit', 'Admin\UserController@edit');
Route::post('profile/user/edit', 'Admin\UserController@update');
Route::get('profile/user/delete', 'Admin\UserController@delete');
Route::get('/profile', 'Front\HomeController@profile')->name('profile');
Route::get('profile/edit', 'Front\HomeController@edit')->name('edit');


// メール
Route::get('/inbox', 'Front\MailController@inbox')->name('inbox');
Route::get('/mail', 'Front\MailController@form')->name('receive');
Route::get('/mail/profile', 'Front\MailController@showProfile')->name('show_profile');
Route::get('mail/reply_form', 'Front\MailController@replyForm')->name('reply_form');
Route::post('mail/send', 'Front\MailController@send')->name('send');
Route::post('mail/reply', 'Front\MailController@reply')->name('reply');
Route::get('/mail/result', 'Front\MailController@result')->name('sended');
Route::get('inbox/delete', 'Front\MailController@delete');
Route::get('inbox/unread', 'Front\MailController@unread');
Route::get('inbox/detail', 'Front\MailController@detail');


// 練習
Route::get('profile/edit', 'PracticeController@show');
Route::get('/delete/{id}', 'PracticeController@deleteMemo')->name('delete');
Route::get('/p', 'PracticeController@showPractice');
Route::get('/pp', 'PracticeController@showSubmit');
Route::get('/ppp', 'PracticeController@postSubmit');
Route::get('/keyboard', 'Front\HomeController@keyboard')->name('add');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
