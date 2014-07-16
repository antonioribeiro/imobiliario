<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 14/07/2014
 * Time: 20:58
 */

namespace Imobiliario\Controllers;

use Imobiliario\Core\BaseController;
use Imobiliario\Forms\PostStatus;
use View;

class Status extends BaseController {

	use CommandBus;

	/**
	 * @param PostStatus $postStatusForm
	 */
	public function __construct(PostStatus $postStatusForm)
	{
		$this->beforeFilter('auth', ['except' => 'index']);

		$this->postStatusForm = $postStatusForm;
	}

	public function index()
	{
		return View::make('pages.status.index');
	}

	public function store()
	{
		$this->postStatusForm->validate(Input::all());

		extract(Input::only(['body']));

		$this->execute(
			new PostStatusCommand($body)
		);

		Flash::message('Your status has been posted!');

		return Redirect::route('statuses.index');
	}

} 
