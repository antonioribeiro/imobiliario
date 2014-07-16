<?php

namespace Imobiliario\Users;

use Imobiliario\Users\User;

class UserRepository {

	public function save(User $user)
	{
		return $user->save();
	}

}
