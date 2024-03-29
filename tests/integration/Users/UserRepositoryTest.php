<?php

use Codeception\TestCase\Test;
use Imobiliario\Domains\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \IntegrationTester
	 */
	protected $tester;

	private $repo;

	protected function _before()
	{
		$this->repo = new UserRepository();
	}

	/**
	 * @test
	 */
	public function it_paginates_all_users()
	{
		TestDummy::times(4)->create('Imobiliario\Domains\Users\User');

		$results = $this->repo->getPaginated(2);

		$this->assertCount(2, $results);
	}


}
