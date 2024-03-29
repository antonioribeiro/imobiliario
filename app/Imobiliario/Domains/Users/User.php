<?php

namespace Imobiliario\Domains\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\Facades\Hash;
use Imobiliario\Core\BaseModel;
use Imobiliario\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

	protected $fillable = ['first_name', 'username', 'email', 'password'];

	protected $presenter = 'Imobiliario\Domains\Users\UserPresenter';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Register a new user
	 *
	 * @param $first_name
	 * @param $email
	 * @param $password
	 * @return static
	 */
	public static function register($first_name, $username, $email, $password)
	{
		$user = new static(compact('first_name', 'username', 'email', 'password'));

		$user->raise(new UserRegistered($user));

		return $user;
	}

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function statuses()
	{
		return $this->hasMany('Imobiliario\Domains\Statuses\Status');
	}

	public function is(User $current)
	{
		return $this->id === $current->id;
	}
}
