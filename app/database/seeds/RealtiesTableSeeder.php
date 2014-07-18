<?php

use Faker\Factory as Faker;
use Imobiliario\Addresses\Address;
use Imobiliario\Ads\Ad;
use Imobiliario\Realties\Realty;
use Imobiliario\UnitTypes\UnitType;
use Imobiliario\Companies\Company;

class RealtiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('pt_BR');

		Address::truncate();
		Realty::truncate();
		UnitType::truncate();

		$unitTypes = [
			UnitType::create(['name' => 'apartamento']),
			UnitType::create(['name' => 'casa']),
			UnitType::create(['name' => 'sala']),
		];

		$company = Company::create([
			'name' => $faker->company,
			'cnpj' => '30.101.103/0001-99',
			'website' => $faker->url,
		]);

		foreach(range(1, 10) as $index)
		{
			shuffle($unitTypes);

			$address = Address::create([
                'street' => $faker->streetName,
                'number' => $faker->randomNumber(3),
                'neighborhood' => $faker->citySuffix,
                'city' => $faker->city,
                'state_id' => 1,
                'country_id' => 'BR',
                'zipcode' => $faker->randomNumber(5) . '-' . $faker->randomNumber(3),
			    'latitude' => $faker->latitude,
			    'longitude' => $faker->longitude,
			]);

			$realty = Realty::create([
                'address_id' => $address->id,
                'address_complement' => $faker->secondaryAddress,
			    'unit_type_id' => $unitTypes[0]->id,
            ]);

			Ad::create([
	           'realty_id' => $realty->id,
	           'company_id' => $company->id,
	           'company_code' => $faker->numberBetween(3,8),
	           'body' => $faker->text(500),
	           'published_at' => $faker->dateTime,
	           'price' => $faker->randomFloat(0, 80000, 5000000),
	           'currency_id' => 1,
	           'url' => $faker->url,
			]);
		}
	}

}
