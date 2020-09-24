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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('info/create', 'Admin\InfoController@add');
    Route::post('info/create', 'Admin\InfoController@create');
    Route::get('info', 'Admin\InfoController@index');
    Route::get('info/edit', 'Admin\InfoController@edit');
    Route::post('info/edit', 'Admin\InfoController@update');
    Route::get('info/delete', 'Admin\InfoController@delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'InfoController@index');

Route::post('/map', 'InfoController@map');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('condo/create', 'Admin\CondoController@add');
    Route::post('condo/create', 'Admin\CondoController@create');
    Route::get('condo', 'Admin\CondoController@index');
    Route::get('condo/edit', 'Admin\Controller@edit');
    Route::post('condo/edit', 'Admin\Controller@update');
    Route::get('condo/delete', 'Admin\Controller@delete');
});