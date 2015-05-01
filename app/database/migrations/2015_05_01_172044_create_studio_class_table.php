<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudioClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('studio_class', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->time('start_time');
			$table->string('room');
			$table->string('day');
			$table->string('instructor');
			$table->string('status');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('studio_class');
	}

}
