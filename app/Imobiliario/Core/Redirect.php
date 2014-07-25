<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 23/07/2014
 * Time: 23:59
 */

namespace Imobiliario\Core;

use Illuminate\Support\Facades\Response;
use Request;

class Redirect {

	public static function __callstatic($name, $parameters)
	{
		if (Request::ajax())
		{
			if ( ! $parameters)
			{
				$parameters = ['success' => true];
			}

			return Response::json($parameters);
		}

		return forward_static_call(
			'Illuminate\Support\Facades\Redirect::' . $name,
			$parameters ?: 302
		);
	}
} 
