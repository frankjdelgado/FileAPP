<?php

use Illuminate\Database\Migrations\Migration;

class CreateFileUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('file_user',function($table){
			$table->integer('file_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->primary(array('file_id','user_id'));
			$table->foreign('file_id')->references('id')->on('files');//->onUpdate('')->onDelete('')
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExist('file_user');
	}

}