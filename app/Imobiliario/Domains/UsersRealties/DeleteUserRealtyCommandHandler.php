<?php

namespace Imobiliario\Domains\UsersRealties;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Imobiliario\Domains\UsersRealties\UserRealtyRepository;

class DeleteUserRealtyCommandHandler implements CommandHandler {

	use DispatchableTrait;

	protected $repository;

	function __construct(UserRealtyRepository $repository)
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
		$userRealty = $this->repository->deleteRealty($command->user, $command->realty_id);

		$this->dispatchEventsFor($userRealty);

		return $userRealty;
	}
}
