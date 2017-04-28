<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	public function up()
	{
		Schema::create('media', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 64)->nullable();;
			$table->string('allow_type', 128)->nullable();;
			$table->boolean('sortable')->default(1);
			$table->string('path');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('media');
	}
}
