<?php

use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\CustomerRepo;
use Bakery\Repositories\BakeryRepo;
use Bakery\Repositories\ProductRepo;

class ReportController extends \BaseController {

	public $orderRepo;
	public $customerRepo;
	public $bakeryRepo;
	public $productRepo;
	public function __construct(OrderRepo $orderRepo, 
								CustomerRepo $customerRepo,
								BakeryRepo $bakeryRepo,
								ProductRepo $productRepo  )
	{
		$this->orderRepo = $orderRepo;
		$this->customerRepo = $customerRepo;
		$this->bakeryRepo = $bakeryRepo;
		$this->productRepo = $productRepo;
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
		$bakery = $this->bakeryRepo->find(1);
		if( ! isset($to))
		{
			$to = date("Y-m-d");
		}
		$orders = $this->orderRepo->orderByCustomerDate($id, $from, $to);
		$total = 0;
		foreach($orders as $item){
			$total = $total + $item->amount;
		}
		if(Input::get('type') =='plain view' ){
			return View::make('report/orders', compact('orders', 'total', 'customer'));	
		}else{
			$view = View::make('pdf/invoice_list', compact('orders', 'total', 'customer','bakery','from','to'))->render();		
			$response = PDF::load($view, 'A4', 'portrait')->show();
		}

		
	}




	public function sales()
	{
		return View::make('report/sales');	
	}
	public function searchSales()
	{
		$from = Input::get('from');
		$to = Input::get('to');
		$orders = $this->orderRepo->ordersByRangeDate($from, $to);
		$labels = array();
		$data = array();
		foreach($orders as $order){
			$amount = $order->amount;
			$date = date("M. d", strtotime($order->created_at));
			array_push($labels, '"'.$date.'"');
			array_push($data, '"'.$amount.'"');
		}
		$data = implode(',', $data);
		$labels = implode(',', $labels);

		return View::make('report/sales', compact('labels', 'data'));
	}

	public function products()
	{
		$product_list = $this->productRepo->getAll();
		$products = array();
		foreach($product_list as $product){
			$products[$product->name] = $product->name;
		}

		return View::make('report/products', compact('products'));		
	}

	public function salesByProduct()
	{
		$product_list = $this->productRepo->getAll();
		$products = array();
		foreach($product_list as $product){
			$products[$product->name] = $product->name;
		}

		$labels = array();
		$from = Input::get('from');
		$to = Input::get('to');
		$product = Input::get('product');
		$orders = $this->orderRepo->ordersByRangeDate($from, $to);
		$data = array();
		$data_chart = array();
		foreach($orders as $order)
		{
			foreach ($order->detail as $detail) {
				$cant = 0;
				if($detail->product->name == $product )
				{
					$cant = $cant + $detail->quantity;
				}
				array_push($data, "'".$cant."'");
				array_push($labels, "'".Format::date($order->created_at)."'");
			}
		}
		$labels = implode(',', $labels);
		$data = implode(',', $data);
		//dd($labels);
		return View::make('report/products', compact('products','data','labels'));
	}


}
