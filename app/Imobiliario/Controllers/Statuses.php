<?php

namespace Imobiliario\Controllers;

use Illuminate\Support\Facades\Redirect;
use Imobiliario\Core\BaseController;
use Imobiliario\Core\CommandBus;
use Imobiliario\Forms\PostStatus;
use Imobiliario\Statuses\PostStatusCommand;
use Imobiliario\Statuses\StatusRepository;
use Laracasts\Flash\Flash;
use View;
use Input;
use Auth;

class Statuses extends BaseController {

	use CommandBus;

	private $postStatusForm;

	/**
	 * @var StatusRepository
	 */
	private $statusRepository;

	/**
	 * @param PostStatus $postStatusForm
	 */
	public function __construct(PostStatus $postStatusForm, StatusRepository $statusRepository)
	{
		$this->beforeFilter('auth', ['except' => 'index']);

		$this->postStatusForm = $postStatusForm;

		$this->statusRepository = $statusRepository;
	}

	public function index()
	{
		$statuses = $this->statusRepository->getAll(Auth::user());

		return View::make('pages.status.index', compact('statuses'));
	}

	public function store()
	{
		$this->postStatusForm->validate(Input::only('body'));

		$this->execute(
			new PostStatusCommand(Input::get('body'), Auth::user()->id)
		);

		Flash::message('Your status has been posted!');

		return Redirect::refresh();
	}

} 
