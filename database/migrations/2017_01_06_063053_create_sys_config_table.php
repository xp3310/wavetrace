<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSysConfigTable extends Migration {

	public function up()
	{
		Schema::create('sys_config', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 32);
			$table->text('value');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sys_config');
	}
}