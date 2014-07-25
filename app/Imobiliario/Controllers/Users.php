<?php
/**
 * Created by PhpStorm.
 * User: AntonioCarlos
 * Date: 14/07/2014
 * Time: 20:58
 */

namespace Imobiliario\Controllers;

use Imobiliario\Core\BaseController;
use Imobiliario\Domains\Users\User;
use Imobiliario\Domains\Users\UserRepository;
use View;

class Users extends BaseController {

	/**
	 * @var
	 */
	private $userRepository;

	/**
	 * @param UserRepository $userRepository
	 */
	function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 *
	 */
	public function index()
	{
		$users = $this->userRepository->getPaginated();

		return View::make('users.index')->with(compact('users'));
	}

	public function show($username)
	{
		$user = $this->userRepository->findByUsername($username);

		return View::make('users.show')->with(compact('user'));
	}

} 
