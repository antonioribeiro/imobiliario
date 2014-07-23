<?php

use PragmaRX\Support\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharacteristicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function migrateUp()
	{
		Schema::create('characteristics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('abbreviation');
			$table->integer('importance')->default(0);
			$table->boolean('is_float')->default(false);
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
		Schema::drop('characteristics');
	}

}
