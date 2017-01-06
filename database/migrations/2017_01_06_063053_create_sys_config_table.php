<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysConfigTable extends Migration {

	public function up()
	{
		Schema::create('sys_config', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 32);
			$table->text('value');
		});
	}

	public function down()
	{
		Schema::drop('sys_config');
	}
}