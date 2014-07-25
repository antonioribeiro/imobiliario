<?php

namespace Imobiliario\Domains\UsersRealties;


class DeleteUserRealtyCommand {

	public $realty_id;

	public $user;

	function __construct($realty_id, $user)
	{
		$this->realty_id = $realty_id;

		$this->user = $user;
	}

} 
