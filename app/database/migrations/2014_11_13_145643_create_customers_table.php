<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('full_name');
			$table->string('invoice_address');
			$table->string('delivery_address');
			$table->string('register_number');
			$table->string('phone_number');
			$table->string('email');
			$table->enum('payment_period',['30 days','60 days','cash on delivery','weekly']);
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
		Schema::drop('customers');
	}

}
