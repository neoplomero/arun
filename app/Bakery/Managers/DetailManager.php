<?php

namespace Bakery\Managers;

class DetailManager extends BaseManager{
	public function getRules()
	{
		$rules = [
			'quantity' 		=> 'required',
			'single_price'	=> 'required',
			'total_price' 	=> 'required',
			'order_id' 		=> 'required',
			'product_id' 	=> 'required',
			'type' 			=> 'required'
		];
		
		return $rules;
	}
}


?>