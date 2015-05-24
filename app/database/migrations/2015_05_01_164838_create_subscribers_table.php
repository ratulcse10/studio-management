<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscribersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscribers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('address');
			$table->string('phone');
			$table->string('social_security');
			$table->enum('gender',['male','female','other']);
			$table->enum('payment_type', array('hourly', 'salary','custom'))->default('custom');
			$table->enum('payment_cycle', array('weekly', 'biweekly','monthly'))->nullable();
			$table->double('payment_amount', 15, 2)->nullable();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subscribers');
	}

}
