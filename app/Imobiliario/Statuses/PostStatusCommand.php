<?php

namespace Imobiliario\Registration;


class PostStatusCommand {

	public $body;

	function __construct($body)
	{
		$this->body = $body;
	}

} 
