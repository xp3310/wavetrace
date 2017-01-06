<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	public function up()
	{
		Schema::create('media', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 64);
			$table->string('allow_type', 128);
			$table->boolean('sortable');
			$table->string('path');
			$table->datetime('create_time');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('media');
	}
}