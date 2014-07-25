<?php

namespace Imobiliario\Domains\UsersAds;

use Imobiliario\Domains\Users\User;

class UserAdRepository {

	public function save(User $user)
	{
		return $user->save();
	}

}
