<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWayToGetTable extends Migration {

	public function up()
	{
		Schema::create('way_to_get', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 64);
			$table->text('description');
			$table->integer('sn');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('way_to_get');
	}
}