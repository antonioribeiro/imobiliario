<?php

View::composer('*', function($view)
{
	$view->with('app_name_caps', 'Imobiliar.io');

	$view->with('currentUser', Auth::user());

	$view->with('assets', asset('assets'));

	$view->with('assets_main', asset('assets/layouts/main'));
});
