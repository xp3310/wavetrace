<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomTable extends Migration {

	public function up()
	{
		Schema::create('room', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('media_id');
			$table->string('title', 64);
			$table->text('description');
			$table->integer('price');
			$table->integer('max_capicity');
			$table->integer('more_bed');
		});
	}

	public function down()
	{
		Schema::drop('room');
	}
}