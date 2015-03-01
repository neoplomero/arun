<?php

/**
* 
*/

use Bakery\Repositories\ProductRepo;
use Faker\Factory as Faker;

class QueueController extends BaseController
{
	public function push(){
		$faker = Faker::create();
		$date = Carbon::now()->addMinutes(1);
		Queue::later($date, 'CronOrdersController', array('name'   => $faker->name,
				'description' => $faker->text,
				'price'       => $faker->randomFloat()));

		return 'listo';

	}

}