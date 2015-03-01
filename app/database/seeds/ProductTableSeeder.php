<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Bakery\Entities\Product;

class ProductTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Product::create([
				'name'        => $faker->name,
				'description' => $faker->text,
				'price'       => $faker->randomFloat()

			]);
		}
	}

}