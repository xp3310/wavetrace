<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	public function up()
	{
		Schema::create('order', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('no', 64);
			$table->string('pay_method', 16);
			$table->string('status', 16);
			$table->integer('discount');
			$table->integer('deposit_money');
			$table->integer('total');
		});
	}

	public function down()
	{
		Schema::drop('order');
	}
}