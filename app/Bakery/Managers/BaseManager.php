<?php    

namespace Bakery\Managers;

abstract class BaseManager {
	protected $entity;
	protected $data;
	//protected $errors;

	public function __construct($entity, $data)
	{

		$this->entity = $entity;
		$this->data = array_only($data, array_keys($this->getRules()));

	}

	abstract public function getRules();

	public function isValid()
	{
		$rules = $this->getRules();
		$validation = \Validator::make($this->data, $rules);

		if($validation->fails())
		{
			throw new ValidationException('Validation failed', $validation->messages());
		}
		/*
		$isValid = $validation->passes();
		$this->errors = $validation->messages();

		return $isValid;
		*/
	}

	public function prepareData($data)
	{
		return $data;
	}

	public function save()
	{
		$this->isValid();

		//son metodos de eloquent
		$this->entity->fill($this->prepareData($this->data));
		$this->entity->save();

		return true;
	}

	/*
	public function getErrors()
	{

		return $this->errors;

	}
	*/
}

?>
