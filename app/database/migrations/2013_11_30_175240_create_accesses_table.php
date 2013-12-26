<?php

use Illuminate\Database\Migrations\Migration;

class CreateAccessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accesses',function($table){
			$table->increments('id');//unsigned integer, primary key
			$table->integer('user_id')->unsigned();
			$table->timestamps();//created at, updated at
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
		Schema::dropIfExist('accesses');
	}

}