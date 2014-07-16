<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 15/07/2014
 * Time: 16:34
 */

namespace Imobiliario\Registration\Events;


class UserRegistered {

	public $user;

	function __construct($user)
	{
		$this->user = $user;
	}

}
