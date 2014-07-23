<?php

Route::when('*', 'csrf', ['post', 'patch']);

Route::group(['namespace' => 'Imobiliario\Controllers'], function()
{
	Route::get('/', ['as' => 'home', 'uses' => 'Pages@home']);

	Route::get('register', ['as' => 'register.create', 'uses' => 'Registration@create']);

	Route::post('register', ['as' => 'register.store', 'uses' => 'Registration@store']);

	Route::get('login', ['as' => 'login', 'uses' => 'Sessions@create']);

	Route::post('login', ['as' => 'login', 'uses' => 'Sessions@store']);

	Route::get('logout', ['as' => 'logout', 'uses' => 'Sessions@destroy']);

	Route::get('statuses', ['as' => 'statuses.index', 'uses' => 'Statuses@index']);

	Route::post('statuses', ['as' => 'statuses.store', 'uses' => 'Statuses@store']);

	Route::get('realties', ['as' => 'realties', 'uses' => 'Realties@index']);

	Route::get('realties/infinite', ['as' => 'realties.infinite', 'uses' => 'Realties@infinite']);

	Route::group(['prefix' => 'api/v1'], function()
	{
		Route::get('/', ['as' => 'api.v1', 'uses' => 'UserRealties@index']);

		Route::get('realties/delete/{id}', ['as' => 'users.realties.delete', 'uses' => 'UserRealties@delete']);
	});
});
