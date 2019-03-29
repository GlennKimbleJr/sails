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
Route::get('/boats', 'BoatsController@index')->name('boats.index')->middleware('auth');
Route::get('/boats/{boat}', 'BoatsController@show')->name('boats.show')->middleware('auth');
Route::get('/boats/{boat}/purchase', 'SalesController@create')->name('sales.create')->middleware('auth');
Route::post('/boats/{boat}/purchase', 'SalesController@store')->name('sales.store')->middleware('auth');
