<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaItemTable extends Migration {

	public function up()
	{
		Schema::create('media_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('media_id');
			$table->string('title', 64);
			$table->text('description');
			$table->string('file_origin_name', 255);
			$table->string('file_name', 255);
			$table->string('file_type', 16);
			$table->integer('sn');
		});
	}

	public function down()
	{
		Schema::drop('media_item');
	}
}