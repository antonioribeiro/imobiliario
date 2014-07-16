<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 14/07/2014
 * Time: 20:58
 */

namespace Imobiliario\Controllers;

use Imobiliario\Core\BaseController;
use View;

class Status extends BaseController {

	public function index()
	{
		return View::make('pages.status.index');
	}

} 
