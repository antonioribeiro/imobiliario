<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Tables.
	 *
	 * @var array
	 */
	protected $tables = [
		'activations',
		'addresses',
		'ads',
		'ads_characteristics',
		'characteristics',
		'companies',
		'countries',
		'currencies',
		'firewall',
		'groups',
		'groups_users',
		'realties',
		'reminders',
		'states',
		'statuses',
		'throttle',
		'unit_types',
		'users',
	];

	/**
	 * Database seeders.
	 *
	 * @var array
	 */
	protected $seeders = [
		'RealtiesTableSeeder',
		'UsersTableSeeder',
		'StatusesTableSeeder',
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->cleanDatabaseTables();

		$this->seed();
	}

	/**
	 *  Clean out the database
	 *
	 */
	private function cleanDatabaseTables()
	{
		foreach($this->tables as $table)
		{
			DB::table($table)->truncate();
		}
	}

	/**
	 *  Seed the database
	 */
	private function seed()
	{
		foreach ($this->seeders as $seeder)
		{
			$this->call($seeder);
		}

	}

}
