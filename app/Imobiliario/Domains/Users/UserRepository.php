<?php

namespace Imobiliario\Domains\Users;

use Imobiliario\Domains\Users\User;

class UserRepository {

	/**
	 * Save a user.
	 *
	 * @param User $user
	 * @return bool
	 */
	public function save(User $user)
	{
		return $user->save();
	}

	/**
	 * Get a paginated list of all users.
	 *
	 * @param int $howMany
	 * @return \Illuminate\Pagination\Paginator
	 */
	public function getPaginated($howMany = 25)
	{
		return User::orderBy('first_name')->simplePaginate($howMany);
	}

	/**
	 * Fetch a user by their username.
	 *
	 * @param $username
	 * @return \Illuminate\Database\Eloquent\Model|null|static
	 */
	public function findByUsername($username)
	{
		return User::where('username', $username)->first();
	}
}
