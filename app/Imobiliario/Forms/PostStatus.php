<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 15/07/2014
 * Time: 12:31
 */

namespace Imobiliario\Forms;

use Laracasts\Validation\FormValidator;

class PostStatus extends FormValidator {

	protected $rules = [
	    'body' => 'required',
	];

} 
