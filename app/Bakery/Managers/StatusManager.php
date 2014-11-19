<?php

namespace Bakery\Managers;

class StatusManager extends BaseManager{
	public function getRules()
	{
		$rules = [
			'status' => 'required',
			'order_id'	=> 	'required',
			'user_id' => 'required',
			
		];
		
		return $rules;
	}
}


?>