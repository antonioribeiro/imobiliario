<?php

use Faker\Factory as Faker;
use Imobiliario\Domains\Addresses\Address;
use Imobiliario\Domains\Ads\Ad;
use Imobiliario\Domains\AdsCharacteristics\AdCharacteristic;
use Imobiliario\Domains\Characteristics\Characteristic;
use Imobiliario\Domains\Countries\Country;
use Imobiliario\Domains\Currencies\Currency;
use Imobiliario\Domains\Realties\Realty;
use Imobiliario\Domains\States\State;
use Imobiliario\Domains\UnitTypes\UnitType;
use Imobiliario\Domains\Companies\Company;

class RealtiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('pt_BR');

		$unitTypes = [
			UnitType::create(['name' => 'apartamento']),
			UnitType::create(['name' => 'casa']),
			UnitType::create(['name' => 'sala']),
		];

		$currencies = [
			Currency::create(['name' => 'Real', 'code' => 'BRL', 'symbol' => 'R$', 'decimals' => 2, 'decimal_point' => ',', 'thousands_separator' => '.']),
			Currency::create(['name' => 'Swiss franc', 'code' => 'CHF', 'symbol' => 'SFr.', 'decimals' => 2, 'decimal_point' => '.', 'thousands_separator' => "'"]),
			Currency::create(['name' => 'US Dollar', 'code' => 'USD', 'symbol' => '$', 'decimals' => 2, 'decimal_point' => '.', 'thousands_separator' => ',']),
			Currency::create(['name' => 'Euro', 'code' => 'EUR', 'symbol' => '€', 'decimals' => 2, 'decimal_point' => '.', 'thousands_separator' => ',']),
		];

		$countries = [
			Country::create(['name' => 'Brazil', 'code' => 'BR', 'currency_id' => $currencies[0]->id]),
			Country::create(['name' => 'Swiss', 'code' => 'CH', 'currency_id' => $currencies[1]->id]),
			Country::create(['name' => 'United States', 'code' => 'US', 'currency_id' => $currencies[2]->id]),
			Country::create(['name' => 'Italy', 'code' => 'IT', 'currency_id' => $currencies[3]->id]),
		];

		$states = [
			State::create(['name' => 'Rio de Janeiro', 'code' => 'RJ', 'country_id' => $countries[0]->id]),
			State::create(['name' => 'São Paulo', 'code' => 'SP', 'country_id' => $countries[0]->id]),
			State::create(['name' => 'Minas Gerais', 'code' => 'MG', 'country_id' => $countries[0]->id]),
		];

		$company = Company::create([
			'name' => $faker->company,
			'cnpj' => '30.101.103/0001-99',
			'website' => $faker->url,
		]);

		$caracteristics = [
			Characteristic::create(['name' => 'Área', 'abbreviation' => 'Área', 'importance' => 100]),
			Characteristic::create(['name' => 'Dormitórios', 'abbreviation' => 'Dorm', 'importance' => 99]),
			Characteristic::create(['name' => 'Suítes', 'abbreviation' => 'Suítes', 'importance' => 98]),
			Characteristic::create(['name' => 'Vagas de garagem', 'abbreviation' => 'Vagas', 'importance' => 97]),
		];

		foreach(range(1, 67) as $index)
		{
			shuffle($unitTypes);

			$address = Address::create([
                'street' => $faker->streetName,
                'number' => $faker->randomNumber(3),
                'neighborhood' => $faker->city,
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

			$ad = Ad::create([
	           'realty_id' => $realty->id,
	           'company_id' => $company->id,
	           'company_code' => $faker->numberBetween(3,8),
	           'body' => $faker->text(500),
	           'published_at' => $faker->dateTime,
	           'price' => $faker->randomFloat(0, 80000, 5000000),
	           'currency_id' => $currencies[0]->id,
	           'url' => $faker->url,
			]);

			// Area
			AdCharacteristic::create([
				'ad_id' => $ad->id,
				'characteristic_id' => $caracteristics[0]->id,
			    'quantity' => $faker->numberBetween(3,15)*10,
			]);

			// Bedrooms
			AdCharacteristic::create([
                'ad_id' => $ad->id,
                'characteristic_id' => $caracteristics[1]->id,
                'quantity' => $dorms = $faker->numberBetween(1,4),
            ]);

			// Suites
			AdCharacteristic::create([
                'ad_id' => $ad->id,
                'characteristic_id' => $caracteristics[2]->id,
                'quantity' => $faker->numberBetween(0,$dorms),
            ]);

			// Garage
			AdCharacteristic::create([
                'ad_id' => $ad->id,
                'characteristic_id' => $caracteristics[3]->id,
                'quantity' => $faker->numberBetween(0,2),
            ]);
		}
	}

}
