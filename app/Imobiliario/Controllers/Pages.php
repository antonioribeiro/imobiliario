<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 14/07/2014
 * Time: 13:40
 */

namespace Imobiliario\Controllers;

use Controller;
use View;

class Pages extends Controller {

	public function home()
	{
		return View::make('pages.home');
	}

} 
