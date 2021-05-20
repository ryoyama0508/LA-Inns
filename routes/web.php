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

Route::get('Inn', 'InnController@index')->name('inn_index');
Route::get( '/user_index', 'UserController@index' )->name( 'user_index' );
