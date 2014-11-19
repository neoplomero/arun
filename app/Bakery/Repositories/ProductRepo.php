<?php



namespace Bakery\Repositories;
use Bakery\Entities\Product;
use Bakery\Entities\Detail;


class ProductRepo extends BaseRepo {

	

	public function getModel()
	{
		return new Product;
	}


	public function getList()
	{
		return Product::paginate(12);
		
	}
	public function getAll()
	{
		return Product::all();
		
	}
	public function newProduct()
	{
		$product = new Product();
		
		return $product;
	}
}

?>