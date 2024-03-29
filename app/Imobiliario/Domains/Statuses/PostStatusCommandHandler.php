<?php

namespace Imobiliario\Domains\Statuses;

use Illuminate\Support\Facades\Input;
use Imobiliario\Domains\Statuses\Status;
use Imobiliario\Domains\Statuses\StatusRepository;
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

		$this->repository->save($status, $command->user_id);

		$this->dispatchEventsFor($status);

		return $status;
	}
}
