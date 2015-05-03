<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCreatedByToStudioClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('studio_class', function(Blueprint $table)
		{
			$table->integer('created_by')->unsigned();
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
		Schema::table('studio_class', function(Blueprint $table)
		{
			$table->dropForeign('studio_class_created_by_foreign');
			$table->dropColumn('created_by');
		});
	}

}
