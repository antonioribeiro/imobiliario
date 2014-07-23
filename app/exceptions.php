<?php

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

App::error(function(Laracasts\Validation\FormValidationException $exception, $code)
{
	return Redirect::back()->withInput()->withErrors($exception->getErrors());
});
