<?php

namespace Imobiliario\Domains\Statuses;

use Imobiliario\Domains\Statuses\Status;
use Imobiliario\Domains\Users\User;

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
			return $user->statuses()->with('user')->latest()->get();
		}

		return Status::all();
	}

}
