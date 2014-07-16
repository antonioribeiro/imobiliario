<?php

Route::group(['namespace' => 'Imobiliario\Controllers'], function()
{
	Route::get('/', ['as' => 'home', 'uses' => 'Pages@home']);

	Route::get('register', ['as' => 'register.create', 'uses' => 'Registration@create']);

	Route::post('register', ['as' => 'register.store', 'uses' => 'Registration@store']);

	Route::get('login', ['as' => 'login', 'uses' => 'Sessions@create']);

	Route::post('login', ['as' => 'login', 'uses' => 'Sessions@store']);

	Route::get('logout', ['as' => 'logout', 'uses' => 'Sessions@destroy']);

	Route::get('statuses', ['as' => 'status', 'uses' => 'Status@index']);

	Route::post('statuses', ['as' => 'status.store', 'uses' => 'Status@store']);
});
