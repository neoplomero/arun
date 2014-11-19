<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Bakery\Entities\User;


class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 80) as $index)
		{
			$fullName = $faker->name;

				$user = User::create([
					'full_name' => $fullName,
					'email' => $faker->email,
					'password' => '123456',
					'user_type' => $faker->randomElement(['admin','delivery','manufacturer','saler']),
					'address' => $faker->address,
					'phone_number' => $faker->phoneNumber

					]);

			
		}
	}

}