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

    // Users
    Route::get      ('/u',              ['as' => 'administrator.user', 'uses'           => 'Administrators\UsersController@index']);
    Route::get      ('/u/create',       ['as' => 'administrator.user.create', 'uses'    => 'Administrators\UsersController@create']);
    Route::post     ('/u',              ['as' => 'administrator.user.store', 'uses'     => 'Administrators\UsersController@store']);
    Route::patch    ('/u/{id}',         ['as' => 'administrator.user.update', 'uses'    => 'Administrators\UsersController@update']);
    Route::delete   ('/u/{id}',         ['as' => 'administrator.user.delete', 'uses'    => 'Administrators\UsersController@delete']);

    // Water Pump
    Route::get      ('/water-pump',             ['as' => 'administrator.waterpump',          'uses' => 'Administrators\WaterPumpsController@index']);
    Route::get      ('/water-pump/create',      ['as' => 'administrator.waterpump.create',   'uses' => 'Administrators\WaterPumpsController@create']);
    Route::post     ('/water-pump/store',       ['as' => 'administrator.waterpump.store',    'uses' => 'Administrators\WaterPumpsController@store']);
    Route::patch    ('/water-pump/{id}',        ['as' => 'administrator.waterpump.update',   'uses' => 'Administrators\WaterPumpsController@update']);
    Route::delete   ('/water-pump/{id}',        ['as' => 'administrator.waterpump.delete',   'uses' => 'Administrators\WaterPumpsController@delete']);

    // Water Pump Infras
    Route::get      ('/water-pump-infra',             ['as' => 'administrator.waterpumpInfra',          'uses' => 'Administrators\WaterPumpInfrastructureController@index']);
    Route::get      ('/water-pump-infra/create',      ['as' => 'administrator.waterpumpInfra.create',   'uses' => 'Administrators\WaterPumpInfrastructureController@create']);
    Route::post     ('/water-pump-infra/store',       ['as' => 'administrator.waterpumpInfra.store',    'uses' => 'Administrators\WaterPumpInfrastructureController@store']);
    Route::patch    ('/water-pum-infrap/{id}',        ['as' => 'administrator.waterpumpInfra.update',   'uses' => 'Administrators\WaterPumpInfrastructureController@update']);
    Route::delete   ('/water-pump-infra/{id}',        ['as' => 'administrator.waterpumpInfra.delete',   'uses' => 'Administrators\WaterPumpInfrastructureController@delete']);

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