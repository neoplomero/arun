<?php

use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\CustomerRepo;

class ReportController extends \BaseController {

	public $orderRepo;
	public $customerRepo;
	public function __construct(OrderRepo $orderRepo, 
								CustomerRepo $customerRepo  )
	{
		$this->orderRepo = $orderRepo;
		$this->customerRepo = $customerRepo;
	}

	public function ordersByCustomer($id)
	{	
		$customer = $this->customerRepo->find($id);
		$orders = $this->orderRepo->lastMonthOrders($id);
		$total = 0;
		foreach($orders as $item){
			$total = $total + $item->amount;
		}
		return View::make('report/orders', compact('orders', 'total', 'customer'));
	}
	public function ordersByCustomerFilter()
	{
		$id = Input::get('customer_id');
		$customer = $this->customerRepo->find($id);
		$from = Input::get('from');
		$to = Input::get('to');

		if( ! isset($to))
		{
			$to = date("Y-m-d");
		}
		$orders = $this->orderRepo->orderByCustomerDate($id, $from, $to);

		$total = 0;
		foreach($orders as $item){
			$total = $total + $item->amount;
		}
		return View::make('report/orders', compact('orders', 'total', 'customer'));
	}


}
