<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

//administrator
Route::group(['prefix' => '/administrator', 'middleware'=>['auth', 'role:administrator']], function() {
    Route::get('/', function () {
        return view('administrator');
    });

    Route::get('/profile', ['as' => 'administrator.profile', 'uses' => 'ProfileController@edit']);
});

//admin
Route::group(['prefix' => '/admin', 'middleware'=>['auth', 'role:admin']], function() {
    Route::get('/', function () {
        return view('admin');
    });

    Route::get('/profile', ['as' => 'admin.profile', 'uses' => 'ProfileController@edit']);
});

//checker
Route::group(['prefix' => '/checker', 'middleware'=>['auth', 'role:checker']], function() {
    Route::get('/', function () {
        return view('checker');
    });

    Route::get('/profile', ['as' => 'checker.profile', 'uses' => 'ProfileController@edit']);
});