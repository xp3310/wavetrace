<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterOrderItemTable extends Migration {

	public function up()
	{
		Schema::table('order_item', function(Blueprint $table) {
			$table->dropColumn('room_id');
			$table->dropColumn('room_cnt');
			$table->dropColumn('check_in');
			$table->dropColumn('check_out');


			$table->string('product_id')->after('order_id');
			$table->integer('product_cnt')->after('product_id');
			$table->datetime('date')->after('product_cnt');
		});
	}

	public function down()
	{
		Schema::drop('order_item');
	}
}
