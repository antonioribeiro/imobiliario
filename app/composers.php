<?php

View::composer('*', function($view)
{
	$view->with('app_name_caps', 'Imobiliar.io');
});

View::composer('layouts.*', function($view)
{
    $view->with('assets_main', asset('assets/layouts/main'));
});

View::share('currentUser', Auth::user());
