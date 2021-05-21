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

Route::get('/', 'AdminHomeController@admin_home')->name( 'admin_home' );

Route::resource('inns', 'InnController');
Route::get('innSearch', 'InnController@search')->name('inn_search');
Route::post( 'innCreateConfirm', 'InnController@createConfirm' )->name( 'inn_create_confirm' );

Route::resource( 'users', 'UserController' );
Route::get( 'userSearch', 'UserController@search' )->name( 'user_search' );