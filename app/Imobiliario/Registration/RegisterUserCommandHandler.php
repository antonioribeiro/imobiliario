<?php

namespace Imobiliario\Registration;

use Illuminate\Support\Facades\Input;
use Imobiliario\Users\User;
use Imobiliario\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler {

	use DispatchableTrait;

	protected $repository;

	function __construct(UserRepository $repository)
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
		$user = User::register(
			$command->first_name,
			$command->email,
			$command->password
		);

		$this->repository->save($user);

		$this->dispatchEventsFor($user);

		return $user;
	}
}
