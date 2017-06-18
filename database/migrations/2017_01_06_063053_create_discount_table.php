<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountTable extends Migration {

	public function up()
	{
		Schema::create('discount', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 64);
			$table->text('description');
			$table->string('code', 64);
			$table->string('type');
			$table->integer('value');
			$table->integer('remain');
			$table->datetime('start_time');
			$table->datetime('end_time');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('discount');
	}
}