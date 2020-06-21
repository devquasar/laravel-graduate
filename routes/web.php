<?php

use Illuminate\Support\Facades\Route;

//Login-Register
Route::middleware(['guest'])->group(function () {
    Route::name('auth.')->group(function () {
        Route::get('/signin', 'AuthController@getSignin')->name('signin');
        Route::post('/signin', 'AuthController@postSignin')->name('signin.submit');
        Route::get('/signup', 'AuthController@getSignup')->name('signup');
        Route::post('/signup', 'AuthController@postSignup')->name('signup.submit');
    });
});

//Logout
Route::name('auth.')->group(function () {
    Route::get('/signout', 'AuthController@getSignout')->name('signout');
});

//Home
Route::get('/', 'All\BasePublicController@getTwoLastRecords')->name('home');
//About
Route::get('/about', 'All\BasePublicController@about')->name('about');
//Work
Route::get('/works', 'All\BasePublicController@allWorks')->name('works');
//Contact
Route::get('/contact', 'All\BasePublicController@contact')->name('contact');
//Documents
Route::get('/documents/{id}', 'All\BasePublicController@documentsDownload')->name('documents.download');

//Admin-panel
Route::middleware(['status', 'auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'Admin\HomeController@index')->name('admin.index');
        Route::resource('documents', 'Admin\DocumentsController');
        Route::resource('facts', 'Admin\FactsController');
        Route::resource('news', 'Admin\NewsController');
        Route::resource('work', 'Admin\WorkController');
        Route::resource('users', 'Admin\UserController');
    });
});










