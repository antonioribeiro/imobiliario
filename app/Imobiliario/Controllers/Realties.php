<?php

namespace Imobiliario\Controllers;

use Illuminate\Support\Facades\Redirect;
use Imobiliario\Core\BaseController;
use Imobiliario\Core\CommandBus;
use Imobiliario\Domains\Ads\Ad;
use Imobiliario\Forms\PostStatus;
use Imobiliario\Domains\Realties\Realty;
use Imobiliario\Domains\Statuses\PostStatusCommand;
use Imobiliario\Domains\Statuses\StatusRepository;
use Laracasts\Flash\Flash;
use View;
use Input;
use Auth;

class Realties extends BaseController {

	public function index()
	{
		$realties = Realty::paginate(15);

		return View::make('realties.index', compact('realties'));
	}

	public function infinite()
	{
		$realties = Realty::paginate(15);

		return View::make('realties.infinite', compact('realties'));
	}
}
