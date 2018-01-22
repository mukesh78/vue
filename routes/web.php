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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/api/v1', 'namespace' => 'Api\V1'], function () {
    Route::resource('companies', 'CompaniesController', ['except' => ['create', 'edit']]);
});
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('companies', 'CompaniesController@index')->name('companies.index');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('items', 'ItemController@index')->name('items.index');
});
Route::group(['prefix' => '/api/v2', 'namespace' => 'Api\V2'], function () {
    Route::resource('items', 'ItemController', ['except' => ['create', 'edit']]);
});
