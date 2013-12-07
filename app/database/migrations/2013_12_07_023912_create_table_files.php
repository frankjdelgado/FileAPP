<?php

//Files Table

use Illuminate\Database\Migrations\Migration;

class CreateTableFiles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files',function($table){
			$table->increments('id');
			$table->string('basedir',255);
			$table->string('filename',255);
			$table->string('title',255);
			$table->integer('size')->unsigned();
			$table->integer('width')->unsigned();
			$table->integer('height')->unsigned();
			$table->string('mime_type',255); //file type
			$table->timestamps();
			$table->unique(array('basedir','filename'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('files');
	}

}