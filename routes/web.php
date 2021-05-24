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
Route::post('innBackFromPlan', 'InnController@backFromPlanCreate')->name('back_to_inn_from_plan');

Route::resource( 'users', 'UserController' );
Route::get( 'userSearch', 'UserController@search' )->name( 'user_search' );

Route::resource( 'plans', 'PlanController' );
Route::post( 'planOneCreate', 'PlanController@createOnePlan' )->name( 'createOnePlan' );
Route::post( 'planAppend', 'PlanController@append' )->name( 'append' );

Route::post( 'planCreateFromEditInn', 'PlanController@createPlanFromEditInn' )->name( 'create_plan_from_edit_inn' );
Route::post( 'planAppendFromEditInn', 'PlanController@appendFromEditInn' )->name( 'append_from_edit_inn' );