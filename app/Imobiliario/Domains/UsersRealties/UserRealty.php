<?php

namespace Imobiliario\Domains\UsersRealties;

use Imobiliario\Core\BaseModel;
use Imobiliario\Domains\UsersRealties\Events\UserRealtyWasDeleted;
use Laracasts\Commander\Events\EventGenerator;

class UserRealty extends BaseModel {

	use EventGenerator;

	protected $fillable = [
		'user_id',
		'realty_id',
		'deleted',
		'favorited',
		'watching',
		'rating',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_realties';

	/**
	 * Delete a user realty
	 *
	 * @param $user_id
	 * @param $realty_id
	 * @return static
	 */
	public static function markAsDeleted($user_id, $realty_id)
	{
		$userRealty = static::findOrCreateUserRealty($user_id, $realty_id);

		$userRealty->deleted = true;

		$userRealty->raise(new UserRealtyWasDeleted($userRealty));

		return $userRealty;
	}

	private static function findOrCreateUserRealty($user_id, $realty_id)
	{
		$userRealty = UserRealty::where('user_id', $user_id)
					->where('realty_id', $realty_id)
					->first();

		if ( ! $userRealty)
		{
			$userRealty = new static(compact('user_id', 'realty_id'));
		}

		return $userRealty;
	}

	public function user()
	{
		return $this->belongsTo('Imobiliario\Domains\Users\User');
	}

	public function realty()
	{
		return $this->belongsTo('Imobiliario\Domains\Realties\Realty');
	}
}
