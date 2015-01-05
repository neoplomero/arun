<?php

use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\CustomerRepo;
use Bakery\Repositories\BakeryRepo;
use Bakery\Repositories\ReportRepo;

class ReportController extends \BaseController {

	public $orderRepo;
	public $customerRepo;
	public $bakeryRepo;
	public $reportRepo;
	public function __construct(OrderRepo $orderRepo, 
								CustomerRepo $customerRepo,
								BakeryRepo $bakeryRepo,
								ReportRepo $reportRepo  )
	{
		$this->orderRepo = $orderRepo;
		$this->customerRepo = $customerRepo;
		$this->bakeryRepo = $bakeryRepo;
		$this->reportRepo = $reportRepo;
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

	public function generate()
	{
		$list = $this->reportRepo->getList();
		return View::make('report/generate',compact('list'));
	}

	public function save()
	{
		$from = Input::get('from');
		$to = Input::get('to');
		$report = $this->reportRepo->newReport();
		$report->from = $from;
		$report->to = $to;
		$report->save();
		return Redirect::back();
	}
	public function printOrders($from, $to, $report_id)
	{
		$bakery = $this->bakeryRepo->find(1);
		$orders = $this->orderRepo->byDateRange($from,$to);
		$total = 0;
		foreach($orders as $order){
			$total = $total + $order->amount;
		}
		$view =  View::make('pdf/sales_list', 
				compact('orders','bakery','from','to','total','report_id'))->render();
		$response = PDF::load($view, 'A4', 'portrait')->show();		
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



}
