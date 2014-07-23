<?php

namespace Imobiliario\Domains\Users;

use Imobiliario\Domains\Users\User;

class UserRepository {

	public function save(User $user)
	{
		return $user->save();
	}

}
