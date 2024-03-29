<?php

use Faker\Factory as Faker;
use Imobiliario\Domains\Statuses\Status;
use Imobiliario\Domains\Users\User;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$users = User::lists('id');

		foreach(range(1, 50) as $index)
		{
			Status::create([
				'user_id' => $faker->randomElement($users),
				'body' => $faker->sentence(),
			]);
		}
	}

}
