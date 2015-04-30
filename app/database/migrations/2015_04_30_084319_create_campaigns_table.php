<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaigns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->dateTime('from');
			$table->dateTime('to');
			$table->integer('ad_type')->unsigned();
			$table->integer('total_copies');
			$table->double('cost', 15,2);
			$table->timestamps();

			$table->foreign('ad_type')->references('id')->on('advertisement_types')->onUpdate('cascade')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campaigns');
	}

}
