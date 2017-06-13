<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterOrderItemTable extends Migration {

	public function up()
	{
		Schema::table('order_item', function(Blueprint $table) {
			$table->dropColumn('room_id');
			$table->dropColumn('room_cnt');

			$table->string('product_id')->after('order_id');
			$table->integer('product_cnt')->after('product_id');
		});
	}

	public function down()
	{
		Schema::drop('order_item');
	}
}
