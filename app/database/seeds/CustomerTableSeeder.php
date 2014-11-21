<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Bakery\Entities\Customer;

class CustomerTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 80) as $index)
		{
			$fullName = $faker->name;

				Customer::create([
					
					'full_name' 		=> $fullName,
					'email' 			=> $faker->email,
					'invoice_address' 	=> $faker->address,
					'delivery_address' 	=> $faker->address,
					'register_number' 	=> '',
					'phone_number' 		=> $faker->phoneNumber

					]);			
		}
	}

}