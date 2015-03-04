<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('status', ['received','processing','out for delivery','delivered','cancelled','open','standing']);
			$table->integer('order_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('note');

			//$table->foreign('order_id')->references('id')->on('orders');
			//$table->foreign('user_id')->references('id')->on('users');

			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('status');
	}

}
