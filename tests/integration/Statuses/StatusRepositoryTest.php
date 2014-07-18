<?php


use Codeception\TestCase\Test;
use Imobiliario\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

	private $repo;

	protected function _before()
    {
	    $this->repo = new StatusRepository();
    }

	/**
	 * @test
	 */
	public function it_gets_all_statuses_for_a_user()
    {
		$users = TestDummy::times(2)->create('Imobiliario\Users\User');

	    TestDummy::times(2)->create('Imobiliario\Statuses\Status', [
			'user_id' => $users[0]->id,
	        'body' => 'My Status',
		]);

	    $statusesForUser = $this->repo->getAll($users[0]);

	    $this->assertCount(2, $statusesForUser);

	    $this->assertEquals('My Status', $statusesForUser[0]->body);
	    $this->assertEquals('My Status', $statusesForUser[1]->body);
    }

	/**
	 * @test
	 */
	public function it_saves_a_status_for_a_specific_user()
	{
		$status = TestDummy::create('Imobiliario\Statuses\Status', [
			'body' => 'His Status',
		]);

		$user = TestDummy::create('Imobiliario\Users\User');

		$savedStatus = $this->repo->save($status, $user->id);

		$this->tester->seeRecord('statuses', [
			'body' => 'His Status',
		]);

		$this->assertEquals($user->id, $savedStatus->user_id);
	}

}
