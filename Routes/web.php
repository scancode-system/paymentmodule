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
Route::prefix('payments')->middleware('auth')->group(function() {
	Route::get('', 'PaymentController@index')->name('payments.index');
	Route::get('create', 'PaymentController@create')->name('payments.create');
	Route::get('{payment}/edit', 'PaymentController@edit')->name('payments.edit');	

	Route::post('', 'PaymentController@store')->name('payments.store');
	Route::put('{payment}', 'PaymentController@update')->name('payments.update');
	Route::delete('{payment}/destroy', 'PaymentController@destroy')->name('payments.destroy');		
});
