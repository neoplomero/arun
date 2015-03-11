<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignkeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('details', function(Blueprint $table)
		{
			$table->foreign('order_id')
				->references('id')
				->on('orders')
				->onDelete('cascade');
		});
		Schema::table('status', function(Blueprint $table)
		{
			$table->foreign('order_id')
				->references('id')
				->on('orders')
				->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('foreignkeys');
	}

}
