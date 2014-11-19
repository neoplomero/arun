<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('quantity')->unsigned;
			$table->float('single_price');
			$table->float('total_price');
			$table->integer('order_id')->unsigned;
			$table->integer('product_id')->unsigned;

			//$table->foreign('order_id')->references('id')->on('orders');
			//$table->foreign('product_id')->references('id')->on('products');

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
		Schema::drop('details');
	}

}
