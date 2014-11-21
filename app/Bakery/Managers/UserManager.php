<?php

namespace Bakery\Managers;

class UserManager extends BaseManager{
	public function getRules()
	{
		$rules = [
			'full_name' 		=> 'required',
			'email'				=> 	'required|email|unique:users,email,'.$this->entity->id,
			//'password' => 'required|confirmed',
			//'password_confirmation' => 'required',
			'user_type' 		=> 'required',
			'address' 			=> 'required',
			'phone_number' 		=> 'required',
			'register_number' 	=> 'required',
			'bank_account' 		=> 'required'
		];
		
		return $rules;
	}
}


?>