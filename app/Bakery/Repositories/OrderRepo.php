<?php
namespace Bakery\Repositories;

use Illuminate\Database\Query\Expression as raw;

use Bakery\Entities\Order;
use Bakery\Entities\Status;

class OrderRepo extends BaseRepo {

	public function getModel()
	{
		return new Order;
	}

	public function byDeliveryDate($date)
	{
		return Order::where('delivery_date', '=', $date)
				->orderBy('id', 'DESC')
				->with('detail')
				->get();
	}

	public function byDateRange($from, $to)
	{
		return Order::whereBetween('created_at', array($from, $to))
				->orderBy('id', 'DESC')
				->with('detail')
				->get();
	}

	public function getList()
	{
		return Order::orderBy('orders.id','DESC')->with('status','customer','user')
		->join('status','orders.id', '=' ,'status.order_id')
		->where('status.id','=',
			new raw('(select `id` from `status` 
				where `order_id` = `orders`.`id` order by `id` desc limit 1)'))
		->where('status.status', '<>', 'standing')
		->paginate(12);
	}
	public function getListByFilter($field, $operator, $value)
	{
		return Order::orderBy('orders.id','DESC')->with('status','customer','user')
		->join('status','orders.id', '=' ,'status.order_id')
		->join('customers','orders.customer_id', '=' ,'customers.id')
		->where('status.id','=',
			new raw('(select `id` from `status` 
				where `order_id` = `orders`.`id` order by `id` desc limit 1)'))
		->where($field, $operator, $value)
		->paginate(12);
	}

	public function getPdfByFilter($field, $operator, $value)
	{
		return Order::orderBy('orders.id','DESC')->with('status','customer','user')
		->where($field, $operator, $value)
		->get();
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

	public function orderByFilter($field, $operator, $search){
		$orders = Order::where($field, $operator, $search)
		->with('customer','user','detail')
		->get();
		return $orders;
	}
	public function ordersByFilter($field, $operator, $search){
		$orders = Order::where($field, $operator, $search)
		->with('customer','user','detail')
		->paginate(12);
		return $orders;
	}
	public function standingOrders(){
		$orders = Order::
				select('orders.id as id', 'model','delivery_date','customers.full_name as full_name')->
				join('customers','orders.customer_id', '=' ,'customers.id')
				->where('type','=','model')
				->paginate(12);
		return $orders;
	}

	public function standingByFilter($search){
		//$orders = Order::join('customers','orders.customer_id', '=' ,'customers.id')
		$orders = Order::		
				select('orders.id as id', 'model','delivery_date','customers.full_name as full_name')->
				join('customers','orders.customer_id', '=' ,'customers.id')
				->where('type','=','model')
				//->where('model', 'LIKE', "%$search%")
				->where(function($q) use ($search){
					$q->orWhere('orders.model', 'LIKE', "%$search%")
					->orWhere('customers.full_name', 'LIKE', "%$search%");
				})
				->paginate(12);
		return $orders;

	}
	public function standingByModelDate($model,$date){
		
		$orders = Order::where('model', '=', "$model")
		->where('type','=','order')
		->where('delivery_date','>',"$date")
		->with('customer','user','detail')
		->orderBy('delivery_date','ASC')
		->take(1)->get();
		//dd($orders);
		return $orders;
	}

	public function lastMonthOrders($id){
		$orders = Order::where('customer_id', '=', $id)
		->where((new raw('MONTH(created_at)')), '=', date('n'))
		->with('customer','user','detail')
		->get();
		return $orders;
	
	}

	public function orderByCustomerDate($id, $from, $to)
	{
		$orders = Order::whereBetween('created_at', array($from, $to))
		->where('customer_id', '=', $id)
		->with('customer','user','detail')
		->get();
		return $orders;
	}
	public function ordersByRangeDate($from, $to)
	{
		$orders = Order::whereBetween('created_at', array($from, $to) )
		->get();
		return $orders;
	}

	public function customer(){
		return $this->belongsTo('Bakery\Entities\Customer');
	}
	public function status($status){
		$orders = Order::with('status','customer')
		->join('status','orders.id', '=' ,'status.order_id')
		->where('status.id','=',
			new raw('(select `id` from `status` 
				where `order_id` = `orders`.`id` order by `id` desc limit 1)'))
		->where('status.status', '=' , $status)->paginate(12);
		return $orders;
	}	

	public function orStatus($statusA, $statusB){
		$orders = Order::with('status','customer')
		->join('status','orders.id', '=' ,'status.order_id')
		->where('status.id','=',
			new raw('(select `id` from `status` 
				where `order_id` = `orders`.`id` order by `id` desc limit 1)'))
		->where(function($query)  use ($statusA, $statusB){
				$query->where('status.status', '=' , $statusA)
				->orWhere('status.status', '=' , $statusB);
			})->orderBy('orders.delivery_date', 'ASC')
		->paginate(12);
		return $orders;
	}	
	public function orStatusDate($statusA, $statusB,$date){
		$orders = Order::with('status','customer')
		->join('status','orders.id', '=' ,'status.order_id')
		->where('status.id','=',
			new raw('(select `id` from `status` 
				where `order_id` = `orders`.`id` order by `id` desc limit 1)'))
		->where(function($query)  use ($statusA, $statusB){
				$query->where('status.status', '=' , $statusA)
				->orWhere('status.status', '=' , $statusB);
			})
		->where('orders.delivery_date','=',$date)
		->orderBy('orders.delivery_date', 'ASC')
		->paginate(12);
		return $orders;
	}		
	public function orStatusByFilter($statusA, $statusB, $field, $operator, $search){
		$orders = Order::with('status','customer')
		->join('status','orders.id', '=' ,'status.order_id')
		->where('status.id','=',
			new raw('(select `id` from `status` 
				where `order_id` = `orders`.`id` order by `id` desc limit 1)'))
		->where(function($query)  use ($statusA, $statusB){
				$query->where('status.status', '=' , $statusA)
				->orWhere('status.status', '=' , $statusB);
			});
		if( $search && $operator && $search)
		{
			$orders = $orders->where($field, $operator , $search );
		}

		$orders = $orders->paginate(12);
		return $orders;
	}	


	public function statusByFilter($status, $field, $operator, $search){
		
		$orders = Order::with('status','customer')
		->join('status','orders.id', '=' ,'status.order_id')
		->where('status.id','=',
			new raw('(select `id` from `status` 
				where `order_id` = `orders`.`id` order by `id` desc limit 1)'))
		->where('status.status', '=' , $status);

		if( $search && $operator && $search)
		{
			$orders = $orders->where($field, $operator , $search );
		}

		$orders = $orders->paginate(12);
		return $orders;
	}

	public function checkStading($date,$model){
		$orders = Order::where('delivery_date', '=', $date)
					->where('model', '=', $model)
					->first();
		return $orders;
	}
}

?>