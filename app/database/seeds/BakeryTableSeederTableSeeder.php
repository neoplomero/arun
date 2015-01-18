<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Bakery\Entities\Bakery;

class BakeryTableSeederTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

				Bakery::create([
					
					'name' 		=> 'arunbakery',
					'email' 			=> $faker->email,
					'address' 	=> $faker->address,
					'register_number' 	=> '',
					'phone_number' 		=> $faker->phoneNumber

					]);		
	}

}