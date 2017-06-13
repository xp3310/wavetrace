<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterRoomTable extends Migration {

	public function up()
	{
		Schema::table('room', function(Blueprint $table) {
			$table->dropColumn('price');
			$table->dropColumn('media_id');
			$table->dropColumn('title');
			$table->dropColumn('description');


			$table->integer('product_id')->after('updated_at');
			$table->integer('holiday_price');
		});

	}

	public function down()
	{
		Schema::drop('room');
	}
}
