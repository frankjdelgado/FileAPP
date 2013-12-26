<?php

use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files',function($table){
			$table->increments('id');//->nullable
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
		Schema::dropIfExist('files');
	}

}