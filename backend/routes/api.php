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

Route::get('/sanctum/csrf-cookie', '\Laravel\Sanctum\Http\Controllers\CsrfCookieController@show')->name('csrf-cookie');

Route::get('/config/menu-list', 'MenuController')->name('menu');

Route::get('/admin/{resource}', 'Resource\IndexController')->name('resource.index');
Route::post('/admin/{resource}', 'Resource\CreateController')->name('resource.create');
Route::get('/admin/{resource}/{id}', 'Resource\ShowController')->name('resource.show');
Route::post('/admin/{resource}/{id}', 'Resource\UpdateController')->name('resource.update');


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

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

    Route::get('keys/search', 'KeyController@search')
        ->name('keys.search');
    Route::resource('keys', 'KeyController')->except([
        'create'
    ]);
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
});
