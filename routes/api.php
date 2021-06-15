<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace'  => 'App\Http\Controllers\Api', 'prefix' => '/'], function () {
    Route::get('/episodes', 'EpisodeController@getAllEpisodes');
    Route::get('/episodes/{id}', 'EpisodeController@getEpisode');

    Route::get('/characters', 'CharacterController@getAllCharacters');
    Route::get('/characters/random', 'CharacterController@getRandomCharacter');

    Route::get('/quotes', 'QuoteController@getAllQuotes');
    Route::get('/quotes/random', 'QuoteController@getRandomQuoteByAuthor');
});