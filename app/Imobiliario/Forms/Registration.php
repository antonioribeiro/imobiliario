<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 15/07/2014
 * Time: 12:31
 */

namespace Imobiliario\Forms;

use Laracasts\Validation\FormValidator;

class Registration extends FormValidator {

	protected $rules = [
		'first_name' => 'required',
	    'email' => 'required|email|unique:users',
	    'password' => 'required|confirmed',
	];
} 
