<?php

use PragmaRX\Support\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function migrateUp()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
			$table->increments('id');

			// A realty must always have at least the country, state and city
			$table->integer('state_id')->unsigned();
			$table->string('city');
			$table->string('country_id', 3);

			$table->string('street')->nullable();
			$table->string('number')->nullable();
			$table->string('neighborhood')->nullable();
			$table->string('zipcode', 9)->nullable();
			$table->float('latitude')->nullable();
			$table->float('longitude')->nullable();

			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function migrateDown()
	{
		Schema::drop('addresses');
	}

}
