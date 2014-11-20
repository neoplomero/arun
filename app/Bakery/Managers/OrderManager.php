<?php

namespace Bakery\Managers;

class OrderManager extends BaseManager{
	public function getRules()
	{
		$rules = [
			'delivery_date' 	=> 'required',
			'delivery_address'	=> 	'required',
            'customer_id' 		=> 'required',
		];
		
		return $rules;
	}
}


?>