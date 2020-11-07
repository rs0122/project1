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
    Route::get('user', 'Admin\InfoController@user');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'InfoController@index');

Route::post('/map', 'InfoController@map');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('condo/create', 'Admin\CondoController@add');
    Route::post('condo/create', 'Admin\CondoController@create');
    Route::get('condo', 'Admin\CondoController@index');
    Route::post('condo', 'Admin\CondoController@post');
    Route::get('condo/edit', 'Admin\CondoController@edit');
    Route::post('condo/edit', 'Admin\CondoController@update');
    Route::get('condo/delete', 'Admin\CondoController@delete');
});

Route::get('/condo', 'CondoController@index');
Route::get('/condo1', 'CondoController@condo1');
Route::get('/column', 'InfoController@column');
Route::get('/special1','CondoController@special1');
Route::get('/special2','CondoController@special2');
Route::get('/special3','CondoController@special3');
Route::get('/special4','CondoController@special4');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/mypage', 'CondoController@add');
});


Route::get('/condo/like/{id}', 'CondoController@like')->name('condo.like');
Route::get('/condo/unlike/{id}', 'CondoController@unlike')->name('condo.unlike');
Route::get('/info/like/{id}', 'InfoController@like')->name('info.like');
Route::get('/info/unlike/{id}', 'InfoController@unlike')->name('info.unlike');

Route::get('/user', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/user/userEdit', 'UserController@userEdit')->name('user.userEdit')->middleware('auth');
Route::post('/user/userEdit', 'UserController@userUpdate')->name('user.userUpdate')->middleware('auth');