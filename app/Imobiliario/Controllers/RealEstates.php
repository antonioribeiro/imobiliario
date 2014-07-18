<?php

namespace Imobiliario\Controllers;

use Illuminate\Support\Facades\Redirect;
use Imobiliario\Core\BaseController;
use Imobiliario\Core\CommandBus;
use Imobiliario\Forms\PostStatus;
use Imobiliario\Realties\Realty;
use Imobiliario\Statuses\PostStatusCommand;
use Imobiliario\Statuses\StatusRepository;
use Laracasts\Flash\Flash;
use View;
use Input;
use Auth;

class RealEstates extends BaseController {

	public function index()
	{
		$realties = Realty::with('address')->get();

		return View::make('realties.index', compact('realties'));
	}

}
