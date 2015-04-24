<?php    namespace Bakery\Repositories;

use Bakery\Entities\Detail;
use Bakery\Entities\Product;
use Bakery\Entities\Customer;


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

	public function getCredit($order_id)
	{
		return Detail::where('order_id', '=', $order_id)
					   ->where('type', '=','credit')
					   ->first();
	}

	public function getDevolutionsBetweenDates($from, $to){
		return Detail::whereBetween('created_at', array($from, $to))
				->where('type', '=' , 'devolution')
				->orderBy('created_at', 'ASC')
				->with('order')
				->get();
	}

	public function devolutionsByCustomer($id){

		$data = Detail::with('product')
				->join('orders','details.order_id', '=' ,'orders.id')
				->where('orders.customer_id', '=', $id)
				->where('details.type', '=', 'devolution')
				->orderBy('orders.created_at', 'DESC')	
				->paginate(12);
		return $data;

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