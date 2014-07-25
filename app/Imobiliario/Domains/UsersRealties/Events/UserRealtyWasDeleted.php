<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 15/07/2014
 * Time: 16:34
 */

namespace Imobiliario\Domains\UsersRealties\Events;


class UserRealtyWasDeleted {

	public $userRealty;

	function __construct($userRealty)
	{
		$this->userRealty = $userRealty;
	}

}
