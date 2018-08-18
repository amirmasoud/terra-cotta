<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', 'UserController@user');
    Route::get('/users', 'UserController@all');

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

    Route::get('settings/icons/search', 'Settings\IconController@search')
        ->name('icons.search');
    Route::resource('settings/icons', 'Settings\IconController')->except([
        'create'
    ]);

    Route::get('settings/tags/search', 'Settings\TagController@search')
        ->name('tags.search');
    Route::resource('settings/tags', 'Settings\TagController')->except([
        'create'
    ]);

    Route::get('settings/categories/search', 'Settings\CategoryController@search')
        ->name('categories.search');
    Route::get('settings/categories/all', 'Settings\CategoryController@all')
        ->name('categories.all');
    Route::resource('settings/categories', 'Settings\CategoryController')->except([
        'create'
    ]);

    Route::get('settings/types/search', 'Settings\TypeController@search')
        ->name('types.search');
    Route::resource('settings/types', 'Settings\TypeController')->except([
        'create'
    ]);

    Route::get('settings/groups/search', 'Settings\GroupController@search')
        ->name('groups.search');
    Route::resource('settings/groups', 'Settings\GroupController')->except([
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

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});
