<?php

use Faker\Factory as Faker;
use Imobiliario\Domains\Users\User;

class UsersTableSeeder extends Seeder {

	private $names = [];

	public function run()
	{
		$faker = Faker::create();

		User::create([
	         'first_name' => 'Antonio Carlos',
	         'username' => 'antonioribeiro',
	         'email'      => 'acr@antoniocarlosribeiro.com',
	         'password'   => 'foda-se',
        ]);

		foreach(range(1, 50) as $index)
		{
			$name = $faker->name;

			User::create([
				'first_name' => $name,
				'username' => $this->createUsername($name),
				'email' => $faker->email,
			    'password' => 'foda-se',
			]);
		}
	}

	private function createUsername($name)
	{
		$faker = Faker::create();

		$name = strtolower(str_replace(' ', '', $name));

		$name = preg_replace("/[^a-zA-Z0-9]+/", "", $name);

		while(in_array($name, $this->names))
		{
			$name = $name . $faker->numberBetween(1,9);
		}

		$this->names[] = $name;

		return $name;
	}

}
