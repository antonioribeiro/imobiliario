<?php

use PragmaRX\Support\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealtiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function migrateUp()
	{
		Schema::create('realties', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('address_id')->unsigned();
			$table->integer('condo_block_id')->unsigned()->nullable();
			$table->integer('building_id')->unsigned()->nullable();
			$table->string('address_complement')->nullable();
			$table->integer('unit_type_id')->unsigned();
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
		Schema::drop('realties');
	}

}
