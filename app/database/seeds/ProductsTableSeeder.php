<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Products::create([
				'name' => '',
				'description' => $faker->text,
				'price' => $faker->randomFloat()

			]);
		}
	}

}