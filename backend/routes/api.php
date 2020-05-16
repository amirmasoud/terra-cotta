<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', 'UserController@user');
    Route::get('/home', 'HomeController@get');

    Route::get('settings/users/search', 'Settings\UserController@search')
        ->name('users.search');
    Route::resource('settings/users', 'Settings\UserController')->except([
        'create'
    ]);

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

    Route::get('settings/tags/search', 'Settings\TagController@search')
        ->name('tags.search');
    Route::resource('settings/tags', 'Settings\TagController')->except([
        'create'
    ]);

    Route::get('settings/categories/search', 'Settings\CategoryController@search')
        ->name('categories.search');
    Route::resource('settings/categories', 'Settings\CategoryController')->except([
        'create'
    ]);

    Route::resource('settings/fields', 'Settings\FieldController')->except([
        'create'
    ]);

    Route::get('safes/search', 'SafeController@search')
        ->name('safes.search');
    Route::resource('safes', 'SafeController')->except([
        'create'
    ]);
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});
