<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailRecordTable extends Migration {

	public function up()
	{
		Schema::create('email_record', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('to', 64);
			$table->string('from');
			$table->string('subject', 64);
			$table->text('body');
			$table->string('status');
		});
	}

	public function down()
	{
		Schema::drop('email_record');
	}
}