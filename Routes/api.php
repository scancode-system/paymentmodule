<?php

Route::prefix('payments')->middleware('auth.basic.once')->group(function() {
	
	Route::get('all', 'Api\PaymentController@all');


});
