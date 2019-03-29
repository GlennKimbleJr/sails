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

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/boats', 'BoatsController@index')->name('boats.index');
    Route::get('/boats/{boat}', 'BoatsController@show')->name('boats.show');
    Route::get('/boats/{boat}/purchase', 'SalesController@create')->name('sales.create');
    Route::post('/boats/{boat}/purchase', 'SalesController@store')->name('sales.store');
    Route::get('/sales', 'SalesController@index')->name('sales.index');
    Route::get('/sales/{sale}', 'SalesController@show')->name('sales.show');
    Route::get('/sales/{sale}/invoice', 'SalesInvoiceController@show')->name('sales.invoice');
});
