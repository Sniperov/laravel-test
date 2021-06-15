<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'  => 'App\Http\Controllers', 'prefix' => '/'], function () {
    Route::get('/', 'LoginController@indexLogin')->name('indexLogin');
    Route::post('login', 'LoginController@login')->name('login');

    Route::get('/register', 'LoginController@indexRegister')->name('indexRegister');
    Route::post('/register', 'LoginController@register')->name('register');
});

// Route::group(['namespace'  => 'App\Http\Controllers', 'prefix' => '/admin'], function () {
//     Route::get('/', 'LoginController@indexLogin')->name('indexLogin');
//     Route::post('login', 'LoginController@login')->name('login');
// });