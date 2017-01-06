<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderItemTable extends Migration {

	public function up()
	{
		Schema::create('order_item', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('order_id');
			$table->string('room_id');
			$table->integer('room_cnt');
			$table->datetime('check_in');
			$table->datetime('check_out');
			$table->integer('subtotal');
		});
	}

	public function down()
	{
		Schema::drop('order_item');
	}
}