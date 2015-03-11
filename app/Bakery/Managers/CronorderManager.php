<?php

namespace Bakery\Managers;

class CronorderManager extends BaseManager{
	public function getRules()
	{
		$rules = [
			'order_id' 		=> 'required',
			'interval'	=> 'required'
		];
		
		return $rules;
	}
}


?>