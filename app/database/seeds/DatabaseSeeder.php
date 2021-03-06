<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('BakeryTableSeederTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('CustomerTableSeeder');
		$this->call('ProductTableSeeder');
	}

}
