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

	public function getDevolutionsBetweenDates($from, $to){
		return Detail::whereBetween('created_at', array($from, $to))
				->where('type', '=' , 'devolution')
				->orderBy('created_at', 'ASC')
				->with('order')
				->get();
	}

	public function newDetail()
	{
		$detail = new Detail();
		
		return $detail;
	}
	public function order(){
		return $this->belongsTo('Bakery\Entities\Order');
	}
	public function product(){
		return $this->belongsTo('Bakery\Entities\Product');
	}

}

?>