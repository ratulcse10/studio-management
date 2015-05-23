<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission_user', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('permission_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::table('permission_user', function (Blueprint $table) {
			$table->dropForeign('permission_user_permission_id_foreign');
			$table->dropForeign('permission_user_user_id_foreign');
		});
		Schema::drop('permission_user');
	}

}
