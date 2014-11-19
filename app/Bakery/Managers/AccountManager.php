<?php

namespace Bakery\Managers;

class AccountManager extends BaseManager{
	public function getRules()
	{
		$rules = [
			'full_name' => 'required',
			'email'	=> 	'required|email|unique:users,email,'.$this->entity->id,
			'password' => 'confirmed',
			'password_confirmation' => '',
			'address' => 'required',
			'phone_number' => 'required',
			'register_number' => 'required',
			'bank_account' => 'required'
		];
		
		return $rules;
	}

	public function prepareData($data){
		$data['full_name'] = strip_tags($data['full_name']);

		return $data;
	}

}


?>