<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelMediaTable extends Migration {

	public function up()
	{
		Schema::create('rel_media', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 32);
			$table->integer('media_id');
		});
	}

	public function down()
	{
		Schema::drop('rel_media');
	}
}