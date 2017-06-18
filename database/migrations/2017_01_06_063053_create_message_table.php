<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	public function up()
	{
		Schema::create('message', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->string('name', 64);
			$table->string('email', 64);
			$table->datetime('send_time');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('message');
	}
}