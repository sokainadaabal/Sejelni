<?php

use Illuminate\Http\Request;

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
Route::post('auth/login', 'Auth\AdminLoginController@login');
Route::post('auth/loginStudent', 'Auth\CondidatLoginController@login');
/* Route of Admin */
Route::get('admin','AdminController@index');
Route::get('admin/{id}','AdminController@show');
Route::post('admin','AdminController@store');
Route::put('admin/{id}','AdminController@update');
Route::delete('admin/{id}','AdminController@delete');
Route::post('search','AdminController@refrech');
/* Route of Filier */
Route::get('filier','FilierController@index');
Route::get('filier/{id}','FilierController@show');
Route::post('filier','FilierController@store');
Route::put('filier/{id}','FilierController@update');
Route::delete('filier/{id}','FilierController@delete');

/* Route of option */
Route::get('option','OptionController@index');
Route::get('option/{id}','OptionController@show');
Route::post('option','OptionController@store');
Route::put('option/{id}','OptionController@update');
Route::delete('option/{id}','OptionController@delete');

/*Route of Candidat */
Route::get('condidat','CondidatController@index');
Route::get('etudiant','CondidatController@index1');
Route::post('condidat','CondidatController@store');
Route::post('recherche','CondidatController@refrech');
Route::put('inscrit/{id}','CondidatController@inscrit');