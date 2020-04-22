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


/**
 * Authentication routes. If you want to require users to verify their email
 * addresses before using the application make sure you add the `verify` option
 * like: Auth::routes(['verify' => true]);
 *
 * @see https://laravel.com/docs/7.x/verification#verification-routing
 */
Auth::routes(['verify' => true]);


/**
 * Socialite required routes. Used to authenticate with OAuth providers using
 * [Laravel Socialite](https://github.com/laravel/socialite)
*/
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


/**
 * Route group for all routes that are only allowed to authenticated and
 * verified users.
 */
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/users', 'UserController');

    // Account management routes
    Route::get('/account', 'AccountController@show')->name('account.show');
    Route::post('/account/token', 'AccountController@createToken')
        ->name('account.token.create');
});
