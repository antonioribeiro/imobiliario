<?php

use PragmaRX\Support\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsCharacteristicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function migrateUp()
	{
		Schema::create('ads_characteristics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ad_id')->unsigned();
			$table->integer('characteristic_id')->unsigned();
			$table->float('quantity');
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
		Schema::drop('ads_characteristics');
	}

}
