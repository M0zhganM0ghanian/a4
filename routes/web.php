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

Route::get('/', 'WelcomeController@index');

Route::get('/search', 'SearchController@getSearchResults');
Route::post('/search', 'SearchController@getSearchResults');

Route::get('/findfriend', 'SearchController@getSearchPage');

Route::get('/user/{userUsername}/{friendUsername?}', 'ProfileController@getProfile');

Route::get('/request/{userUsername}/{friendUsername}', 'RequestController@followRequest');

Route::get('/unfollowrequest/{userUsername}/{friendUsername}', 'RequestController@unfollowRequest');

Route::get('/share', 'StatusesController@shareStatuse');
Route::post('/share', 'StatusesController@shareStatuse');

Route::get('/addinterest/{interestName}', 'InterestController@getInterests');
Route::get('/removeinterest/{interestName}', 'InterestController@removeInterests');

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user)
        dump('You are logged in.', $user->toArray());
    else
        dump('You are not logged in.');

    return;
});


if (config('app.env') == 'local') {
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
