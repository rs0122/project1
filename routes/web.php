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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('info/create', 'Admin\InfoController@add');
    Route::post('info/create', 'Admin\InfoController@create');
    Route::get('info', 'Admin\InfoController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
