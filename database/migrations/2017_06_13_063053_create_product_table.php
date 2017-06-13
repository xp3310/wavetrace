<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	public function up()
	{
		Schema::create('product', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('media_id');
			$table->integer('type');
			$table->string('title', 64);
			$table->text('description');
			$table->integer('price');
		});

	}

	public function down()
	{
		Schema::drop('product');
	}
}
