<?php    namespace Bakery\Repositories;

use Bakery\Entities\Bakery;

class BakeryRepo extends BaseRepo {

	public function getModel()
	{
		return new Bakery;
	}

	public function newBakery()
	{
		$bakery = new Bakery();
		
		return $bakery;
	}
}

?>