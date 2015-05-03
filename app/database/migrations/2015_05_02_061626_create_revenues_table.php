<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revenues', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('created_by')->unsigned();
			$table->double('revenue', 15,2);
			$table->string('month');
			$table->string('year');
			$table->timestamps();
		});
		Schema::table('revenues', function($table) {
	       $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
	   });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('revenues');
	}

}
