<?php    namespace Bakery\Repositories;

use Bakery\Entities\Detail;
use Bakery\Entities\Product;


class DetailRepo extends BaseRepo {

	

	public function getModel()
	{
		return new Detail;
	}


	public function getList()
	{
		return Detail::paginate(12);
		
	}
	public function getAll()
	{
		return Detail::all();
		
	}
	public function newDetail()
	{
		$detail = new Detail();
		
		return $detail;
	}

}

?>