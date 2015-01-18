<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Bakery\Entities\User;


class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		//foreach(range(1, 80) as $index)
		//{
			$fullName = $faker->name;

				$user = User::create([
					'full_name'    => 'jeffer ochoa',
					'email' 	   => 'jeffer.8a@gmail.com',
					'password'     => '12345',
					'user_type'    => 'admin',
					'address'      => $faker->address,
					'phone_number' => $faker->phoneNumber

					]);

			
		//}
	}

}