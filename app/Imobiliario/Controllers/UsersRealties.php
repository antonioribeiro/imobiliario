<?php

namespace Imobiliario\Controllers;

use Auth;
use Imobiliario\Core\Redirect;
use Imobiliario\Core\BaseController;
use Imobiliario\Core\CommandBus;
use Imobiliario\Domains\Ads\Ad;
use Imobiliario\Domains\UsersRealties\DeleteUserRealtyCommand;
use View;

class UsersRealties extends BaseController {

	use CommandBus;

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function delete($realty_id)
	{
		$this->execute(
			new DeleteUserRealtyCommand($realty_id, Auth::user())
		);

		return Redirect::home();
	}

	public function infinite()
	{
		$ads = Ad::paginate(15);

		return View::make('realties.infinite', compact('ads'));
	}
}
