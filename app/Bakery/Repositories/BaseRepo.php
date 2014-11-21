<?php    namespace Bakery\Repositories;

//es abstracta porque solo se usa a travez de su extension

abstract class BaseRepo {

	protected $model;

	public function __construct()
	{

		$this->model = $this->getModel();

	}

	abstract public function getModel();

	public function find($id)
	{

		return $this->model->find($id);

	}


}
?>