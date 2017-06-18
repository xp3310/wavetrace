<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomTable extends Migration {

	public function up()
	{
		Schema::create('room', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('media_id');
			$table->string('title', 64);
			$table->text('description');
			$table->integer('price');
			$table->integer('max_capicity');
			$table->integer('more_bed');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('room');
	}
}