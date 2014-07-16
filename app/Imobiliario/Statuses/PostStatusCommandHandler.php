<?php

namespace Imobiliario\Registration;

use Illuminate\Support\Facades\Input;
use Imobiliario\Statuses\Status;
use Imobiliario\Statuses\StatusRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class PostStatusCommandHandler implements CommandHandler {

	use DispatchableTrait;

	protected $repository;

	function __construct(StatusRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$status = Status::publish($command->body);

		$this->repository->publish($status);

		$this->dispatchEventsFor($status);

		return $status;
	}
}
