<?php

namespace Bakery\Managers;

class ProductManager extends BaseManager{
	public function getRules()
	{
		$rules = [
			'name' => 'required',
			'price'	=> 	'required|numeric|min:0',
			'description' => 'required'
		];
		
		return $rules;
	}
}


?>