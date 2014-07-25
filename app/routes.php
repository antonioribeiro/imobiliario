<?php

use Imobiliario\Domains\Realties\Realty;

Route::any('test', function()
{
	$r = Realty::first();

	dd($r->present()->cheapest);

	dd($r->present()->address->neighborhood);
});

Route::when('*', 'csrf', ['post', 'patch']);

Route::any('environment/set/{env}', function($env)
{
	if($env !== 'production')
	{
		Session::put('env', $env);
	}
});

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

	Route::group(['prefix' => 'realties'], function()
	{
		Route::get('/', ['as' => 'realties', 'uses' => 'Realties@index']);

		Route::get('infinite', ['as' => 'realties.infinite', 'uses' => 'Realties@infinite']);
	});

	Route::get('@{username}', ['as' => 'users.profile', 'uses' => 'Users@show']);

	Route::group(['prefix' => 'users'], function()
	{
		Route::get('/', ['as' => 'users.index', 'uses' => 'Users@index']);
	});

	Route::group(['prefix' => 'api/v1'], function()
	{
		Route::get('/', ['as' => 'api.v1', 'uses' => 'UsersRealties@index']);

		Route::get('realties/delete/{id}', ['as' => 'users.realties.delete', 'uses' => 'UsersRealties@delete']);
	});
});
