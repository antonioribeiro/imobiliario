<?php

namespace Imobiliario\Statuses;

use Imobiliario\Statuses\Status;
use Imobiliario\Users\User;

class StatusRepository {

	public function save(Status $status, $user_id)
	{
		return User::findOrFail($user_id)
				->statuses()
				->save($status);
	}

	public function getAll(User $user = null)
	{
		if ($user)
		{
			return $user->statuses()->get();
		}

		return Status::all();
	}

}
