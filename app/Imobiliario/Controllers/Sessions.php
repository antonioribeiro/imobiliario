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
use Imobiliario\Forms\SignIn as SignInForm;

class Sessions extends BaseController {

	use CommandBus;

	/**
	 * @var SignInForm
	 */
	private $signInForm;

	/**
	 * @param SignInForm $signInForm
	 */
	public function __construct(SignInForm $signInForm)
	{
		$this->beforeFilter('guest', ['except' => 'destroy']);

		$this->signInForm = $signInForm;
	}

	/**
	 * @return mixed
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * @return mixed
	 */
	public function store()
	{
		$input = Input::only('email', 'password');

		$this->signInForm->validate($input);

		if (Auth::attempt($input))
		{
			Flash::message('Welcome back!');

			return Redirect::intended('statuses');
		}
	}

	public function destroy()
	{
		Auth::logout();

		Flash::message('You are now logged out.');

		return Redirect::home();
	}
}
