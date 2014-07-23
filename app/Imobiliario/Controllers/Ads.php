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

class Ads extends BaseController {

	public function index()
	{
		$ads = Ad::paginate(15);

		return View::make('ads.index', compact('ads'));
	}

	public function infinite()
	{
		$ads = Ad::paginate(15);

		return View::make('ads.infinite', compact('ads'));
	}
}
