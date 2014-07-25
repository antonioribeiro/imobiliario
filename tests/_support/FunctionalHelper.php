<?php
namespace Codeception\Module;

use DB;
use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

	public function signIn()
	{
		$this->deleteAllUsers();

		$first_name = 'John Doe';
		$email = 'john@doe.com';
		$password = 'secret';
		$username = 'johndoe';

		$this->haveAnAccount(compact('first_name', 'username', 'email', 'password'));

		$I = $this->getModule('WebDriver');

		$I->amOnPage('/login');

		$I->fillField('email', $email);

		$I->fillField('password', $password);

		$I->click('Sign In');

		$I->see($first_name);
	}

	public function haveAnAccount($overrides = [])
	{
		return $this->have('Imobiliario\Domains\Users\User', $overrides);
	}

	public function postAStatus($body)
	{
		$I = $this->getModule('WebDriver');

		$I->fillField('body', $body);

		$I->click('Post Status');

		// return $this->have('Imobiliario\Statuses\Status', $overrides);
	}

	private function have($model, $overrides = [])
	{
		return TestDummy::create($model, $overrides);
	}

	public function seeRecord($array)
	{
		$I = $this->getLaravel4();

		$I->seeRecord($array);
	}

	private function getLaravel4()
	{
		if ( ! isset($this->laravel4))
		{
			$this->laravel4 = (new \Codeception\Module\Laravel4());

			$this->laravel4->kernel = app();
		}

		return $this->laravel4;
	}

	public function deleteAllUsers()
	{
		DB::table('users')->delete();
	}
}
