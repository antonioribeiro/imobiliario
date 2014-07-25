<?php

namespace Imobiliario\Domains\UsersRealties;

use Imobiliario\Domains\UsersRealties\UserRealty;

class UserRealtyRepository {

	public function deleteRealty($user, $realty_id)
	{
		$userRealty = UserRealty::markAsDeleted($user->id, $realty_id);

		$userRealty->save();

		return $userRealty;
	}

}
