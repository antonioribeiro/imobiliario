<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 14/07/2014
 * Time: 20:58
 */

namespace Imobiliario\Controllers;

use Illuminate\Support\Facades\Redirect;
use Imobiliario\Core\CommandBus;
use Imobiliario\Registration\RegisterUserCommand;
use Laracasts\Flash\Flash;
use View;
use Imobiliario\Core\BaseController;
use Input;
use Imobiliario\Models\User;
use Auth;
use Imobiliario\Forms\Registration as RegistrationForm;

class Registration extends BaseController {

	use CommandBus;

	/**
	 * @var RegistrationForm
	 */
	private $registrationForm;

	/**
	 * @param RegistrationForm $registrationForm
	 */
	public function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;

		$this->beforeFilter('guest');
	}

	/**
	 * @return mixed
	 */
	public function create()
	{
		return View::make('pages.registration.create');
	}

	/**
	 * @return mixed
	 */
	public function store()
	{
		$this->registrationForm->validate(Input::all());

		extract(Input::only(['first_name', 'email', 'password']));

		$user = $this->execute(
			new RegisterUserCommand($first_name, $email, $password)
		);

		Auth::login($user);

		Flash::overlay('Glad to have you as a new Imobiliar.io member!');

		return Redirect::home();
	}
} 
