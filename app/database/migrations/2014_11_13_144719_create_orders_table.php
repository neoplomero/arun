<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('delivery_address');
			$table->date('delivery_date');
			$table->float('amount');
			$table->integer('customer_id')->unsigned();
			$table->integer('order_id')->unsigned();
			$table->enum('payment',['pending payment','paid']);
			$table->string('number');
			$table->enum('email',['sent','pending'])->default('pending');
			$table->enum('type',['order','model'])->default('order');
			$table->string('model');
			//$table->foreign('customer_id')->references('id')->on('customers');
			//$table->foreign('order_id')->references('id')->on('orders');

			$table->timestamps();

		});
		
		Schema::create('details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('quantity')->unsigned();
			$table->float('single_price');
			$table->float('total_price');
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->enum('type',['sale','devolution']);
			//$table->foreign('order_id')->references('id')->on('orders');
			//$table->foreign('product_id')->references('id')->on('products');

			$table->timestamps();
			
		});

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
		Schema::drop('details');
		Schema::drop('orders');
	}

}
