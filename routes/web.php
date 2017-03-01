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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route back to index page
Route::get('/', 'TweetController@index');

//Route to post a new tweet
Route::post('/', 'TweetController@store');

//Route to delete a tweet
Route::get('/{id}/delete', 'TweetController@destroy');

//Route to display a single tweet
Route::get('/tweets/{id}', 'TweetController@view');

//Route to display a form to edit a tweet
Route::get('/tweets/{id}/edit', 'TweetController@edit');

//Route to submit an update for a tweet
Route::post('/tweets/{id}/edit', 'TweetController@update');
