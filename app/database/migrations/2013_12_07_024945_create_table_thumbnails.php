<?php

//Files Thumbnails Table

use Illuminate\Database\Migrations\Migration;

class CreateTableThumbnails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('thumbnails',function($table){
			$table->integer('file_id')->unsigned();
			$table->integer('thumbnail_id')->unsigned();
			$table->string('label',255);
			$table->primary(array('file_id','thumbnail_id'));
			//Foreign Keys associations
			$table->foreign('file_id')->references('id')->on('files');
			$table->foreign('thumbnail_id')->references('id')->on('files');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExist('thumbnails');
	}

}