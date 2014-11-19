<?php



namespace Bakery\Repositories;


use Bakery\Entities\Order;

class OrderRepo extends BaseRepo {

	

	public function getModel()
	{
		return new Order;
	}


	public function getList()
	{

		return Order::orderBy('id','DESC')->paginate(12);

	}
	
	public function newOrder()
	{
		$order = new Order();
		return $order;
	}
	public function getLast()
	{
		$order = Order::orderBy('id', 'DESC')->first();
		return $order;
	}
	public function customer(){
		return $this->belongsTo('Bakery\Entities\Customer');
	}

}

?>