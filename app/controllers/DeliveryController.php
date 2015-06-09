<?php

use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\StatusRepo;
use Bakery\Emails\Email;

class DeliveryController extends \BaseController {

	public $orderRepo;
	public $statusRepo;
	public $email;

	public function __construct(OrderRepo $orderRepo,
								StatusRepo $statusRepo,
								Email $email)
	{
		$this->orderRepo = $orderRepo;
		$this->statusRepo = $statusRepo;
		$this->email = $email;
	}

	public function orders()
	{
		$list = $this->orderRepo->orStatus('out for delivery','delivered');
		return View::make('delivery/list', compact('list'));
	}
	public function search()
	{
		$date = Input::get('delivery_date');
		$list = $this->orderRepo->orStatusDate('out for delivery','delivered',$date);
		return View::make('delivery/list', compact('list'));
	}

	public function send($id)
	{

		$status = $this->statusRepo->newStatus();
		$status->order_id = $id;
		$order = $this->orderRepo->find($id);
		$order->billing_date = date("Y-m-d"); 
		$order->save();
		$customerEmail = $order->customer->email;

		$status->status = 'delivered';
		$status->user_id = Auth::user()->id;
		$status->save();
		//$this->email->invoiceEmail($id, $customerEmail);
		return Redirect::back();
	}

	public function back($id)
	{

		$status = $this->statusRepo->newStatus();
		$status->order_id = $id;
		$status->status = 'out for delivery';
		$status->user_id = Auth::user()->id;
		$status->save();

		return Redirect::back();
	}

	public function viewAll()
	{
		$list = $this->orderRepo->getList();
		return View::make('delivery/list', compact('list'));

	}
}
