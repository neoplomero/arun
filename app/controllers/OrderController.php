<?php

/**
* 
*/

use Bakery\Repositories\CustomerRepo;
use Bakery\Repositories\BakeryRepo;
use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\StatusRepo;
use Bakery\Repositories\ProductRepo;
use Bakery\Repositories\DetailRepo;


use Bakery\Managers\OrderManager;
use Bakery\Managers\StatusManager;
use Bakery\Managers\DetailManager;
use Bakery\Emails\Email;

class OrderController extends BaseController
{
	public $customerRepo;
	public $bakeryRepo;
	public $orderRepo;
	public $productRepo;
	public $detailRepo;
	public $email;

	public function __construct(CustomerRepo $customerRepo, 
								BakeryRepo $bakeryRepo, 
								OrderRepo $orderRepo,
								StatusRepo $statusRepo,
								ProductRepo $productRepo,
								DetailRepo $detailRepo,
								Email $email )
	{
		$this->customerRepo = $customerRepo;
		$this->bakeryRepo = $bakeryRepo;
		$this->orderRepo = $orderRepo;
		$this->statusRepo = $statusRepo;
		$this->productRepo = $productRepo;
		$this->detailRepo = $detailRepo;
		$this->email = $email;
	}

	public function generate($id)
	{
		$bakery = $this->bakeryRepo->find(1);
		$customer = $this->customerRepo->find($id);
		$user = Auth::user();
		return View::make('order/new', compact('customer', 'user', 'bakery'));
	}

	public function save()
	{
		$customer_id = Input::get('id');
		$note = Input::get('note');
		$delivery_address = Input::get('delivery_address');
		$delivery_date = Input::get('delivery_date');
		$order = $this->orderRepo->newOrder();
		$orderData = array();
		$number = Input::get('number');

		$orderData['customer_id'] = $customer_id;
		$orderData['note'] = $note;
		$orderData['delivery_address'] = $delivery_address;
		$orderData['delivery_date'] = $delivery_date;
		$order['number'] = $number;

		$orderManager = new OrderManager($order,$orderData);
		$orderManager->save();

		$orderId = $this->orderRepo->getLast()->id;

		$status = $this->statusRepo->newStatus();
		$statusData = array();

		$user_id = Auth::user()->id;
		$statusData['note'] = $note;
		$statusData['user_id'] = $user_id;
		$statusData['status'] = 'open';
		$statusData['order_id'] = $orderId;
		$statusManager = new StatusManager($status,$statusData);
		$statusManager->save();

		return Redirect::route('order', array('id' => $customer_id));
	}

	public function orderDetail($id){
		
		$bakery = $this->bakeryRepo->find(1);
		$user = Auth::user();
		$status = $this->statusRepo->getLastByUserId($user->id);
		$order = $this->orderRepo->find($id);

		$products = $this->productRepo->getAll();
		$products = $products->lists('name', 'id');

		return View::make('order/detail', compact('user', 'bakery', 'status', 'order', 'products', 'details'));		
		
	}

	public function check($customerId){
		$id = Auth::user()->id;
		$statusReg = $this->statusRepo->getLastByUserId($id);
		if( isset($statusReg) )
		{
			$status = $statusReg->status;
			$order_id = $statusReg->order_id;
		}
		if(isset($status) && $status == 'open'){
			return Redirect::route('detail', array('id' => $order_id));
		}else{
			return   Redirect::action('OrderController@generate', array('id' => $customerId));
		}
		
	}

	public function addDetail()
	{
		$productId = Input::get('product');
		$orderId = Input::get('order_id');
		$quantity = Input::get('quantity');
		$type = Input::get('type');


		$productPrice = $this->productRepo->find($productId)->price;
		$total_price = $productPrice * $quantity;

		$data = array();
		$data['quantity'] = $quantity;
		$data['single_price'] = $productPrice;
		$data['total_price'] = $productPrice * $quantity;
		$data['order_id'] = $orderId;
		$data['product_id'] = $productId;
		$data['type'] = $type;

		$detail = $this->detailRepo->newDetail();
		$detailManager = new DetailManager($detail,$data);
		$detailManager->save();

		$order = $this->orderRepo->find($orderId);
		if($type == 'sale'){
			$order->amount = $order->amount + $total_price;	
		}
		if($type == 'devolution'){
			$order->amount = $order->amount - $total_price;	
		}
		$order->save();

		return Redirect::back();
	}

	public function removeDetail($id)
	{

		$detail = $this->detailRepo->find($id);
		$order = $this->orderRepo->find($detail->order->id);	
		$type = $detail->type;
		if($type == 'sale'){
			$order->amount = $order->amount - $detail->total_price;
		}
		if($type == 'devolution'){
			$order->amount = $order->amount + $detail->total_price;
		}	
		
		$order->save();
		$detail->delete();
		return Redirect::back();
	}

	public function updateDetail()
	{
		$detail = $this->detailRepo->find(Input::get('id'));

		$newPrice = Input::get('single_price') * Input::get('quantity');
		$order = $this->orderRepo->find($detail->order->id);
		$order->amount = $order->amount - $detail->total_price + $newPrice;

		$detail->single_price = Input::get('single_price');
		$detail->total_price = Input::get('single_price') * Input::get('quantity');
		$detail->quantity = Input::get('quantity');

		$order->save();

		$detail->save();

		return Redirect::back();
	}
	public function send($id)
	{

		$order = $this->orderRepo->find($id);
		$statusData = array();
		$statusData['status'] = 'processing';
		$statusData['user_id'] = Auth::user()->id;
		$statusData['order_id'] = $order->id;

		$status = $this->statusRepo->newStatus();
		$manager = new StatusManager($status, $statusData);
		$manager->save();

		//return Redirect::route('orders/list');
		return Redirect::to('orders/list')->with('response','The selected order is in production now');
	}

	public function orderList()
	{
		$list = $this->orderRepo->getList();
		return View::make('order/list', compact('list'));
	}

	public function orderListFilter()
	{
		if(Input::get('delivery_date'))
		{
			$list = $this->orderRepo->getListByFilter('delivery_date', '=', Input::get('delivery_date'));
		}
		if(Input::get('customer'))
		{
			$list = $this->orderRepo->getListByFilter('full_name', 'LIKE', '%'.Input::get('customer').'%');
		}	
		if(Input::get('payment'))
		{
			$list = $this->orderRepo->getListByFilter('payment', '=', Input::get('payment'));
		}	
		return View::make('order/list', compact('list'));
	}	


	public function printSearch()
	{
		return View::make('order/search');
	}
	public function getPdf()
	{
		$bakery = $this->bakeryRepo->find(1);
		$orders = $this->orderRepo->getPdfByFilter('delivery_date', '=', Input::get('delivery_date'));
		$view =  View::make('pdf/multiple_invoice', compact('orders','bakery'))->render();
		$headers = array('Content-Type' => 'application/pdf');
		return Response::make(PDF::load($view, 'A4', 'portrait')->show('invoice'), 200, $headers);

	}



	public function view($id)
	{
		$bakery = $this->bakeryRepo->find(1);
		$order = $this->orderRepo->find($id);
		return View::make('order/view', compact('order', 'bakery'));
	}

	public function pdf($id)
	{
		
		$data = $this->orderRepo->find($id);
		$bakery = $this->bakeryRepo->find(1);
		$view = View::make('pdf/single_invoice', compact('data','bakery'))->render();
		$headers = array('Content-Type' => 'application/pdf');
		return Response::make(PDF::load($view, 'A4', 'portrait')->show('invoice'), 200, $headers);

	}
	public function paid($id){
		$order = $this->orderRepo->find($id);
		$order->payment = 'paid';
		$order->save();
		return Redirect::back();
	}
	
	public function restore($id){
		$order = $this->orderRepo->find($id);
		$order->payment = 'pending payment';
		$order->save();
		return Redirect::back();
	}	

	public function sendByEmail($id, $customerEmail){
		$order = $this->orderRepo->find($id);
		$order->email = 'sent';
		$order->save();
		$this->email->invoiceEmail($id, $customerEmail);
		$response = 'The invoice has been sent by email.';				
		$list = $this->orderRepo->getList();
		return View::make('order/list', compact('list'))->with('response', $response);
	}
	public function addNumber(){
		$order = $this->orderRepo->find(Input::get('id'));
		$order->number = Input::get('number');
		$order->save();
		return Redirect::back();
	}
	public function update(){
		$order = $this->orderRepo->find(Input::get('id'));
		$order->number = Input::get('number');
		$order->delivery_date = Input::get('delivery_date');
		$order->delivery_address = Input::get('delivery_address');
		$order->save();
		return Redirect::back();	
	}
}

?>