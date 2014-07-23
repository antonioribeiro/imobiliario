<?php

use Faker\Factory as Faker;
use Imobiliario\Domains\Users\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		User::create([
	         'first_name' => 'Antonio Carlos',
	         'email'      => 'acr@antoniocarlosribeiro.com',
	         'password'   => 'foda-se',
        ]);

		foreach(range(1, 50) as $index)
		{
			User::create([
				'first_name' => $faker->name,
				'email' => $faker->email,
			    'password' => 'foda-se',
			]);
		}
	}

}
