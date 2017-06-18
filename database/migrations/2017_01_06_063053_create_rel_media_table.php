<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelMediaTable extends Migration {

	public function up()
	{
		Schema::create('rel_media', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 32);
			$table->integer('media_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('rel_media');
	}
}