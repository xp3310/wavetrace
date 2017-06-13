<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropWayToGetTable extends Migration {

	public function up()
	{
		Schema::drop('way_to_get');
	}

	public function down()
	{
		Schema::drop('way_to_get');
	}
}
