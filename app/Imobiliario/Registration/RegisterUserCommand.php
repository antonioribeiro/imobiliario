<?php

namespace Imobiliario\Registration;


class RegisterUserCommand {

	public $first_name;

	public $email;
	
	public $password;

	function __construct($first_name, $email, $password)
	{
		$this->first_name = $first_name;

		$this->email = $email;

		$this->password = $password;
	}

} 
