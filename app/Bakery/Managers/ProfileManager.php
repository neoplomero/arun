<?php

namespace Bakery\Managers;

class ProfileManager extends BaseManager{
	public function getRules()
	{
		$rules = [
			'website' 		=> 'required|url',
			'description' 	=> 'required|max:100',
			'job_type' 		=> 'required|in:full,partial,freelance',
			'category_id' 	=> 'required|exists:categories,id',
			'available' 	=> 'in:1,0'
		];
		
		return $rules;
	}
	public function prepareData($data)
	{
		if( ! isset($data['available']))
		{
			$data['available'] = 0;
		}

		$this->entity->slug = \Str::slug($this->entity->user->full_name);

		

		return $data;
	}

}




?>