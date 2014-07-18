<?php

use PragmaRX\Support\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function migrateUp()
	{
		Schema::create('ads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('realty_id')->unsigned();
			$table->integer('company_id')->unsigned();
			$table->string('company_code');
			$table->text('body')->nullable();
			$table->timestamp('published_at');
			$table->float('price');
			$table->integer('currency_id')->unsigned();
			$table->string('url');
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
		Schema::drop('ads');
	}

}
