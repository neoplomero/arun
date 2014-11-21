<?php

use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\StatusRepo;

class DeliveryController extends \BaseController {

	public $orderRepo;
	public $statusRepo;

	public function __construct(OrderRepo $orderRepo,
								StatusRepo $statusRepo)
	{
		$this->orderRepo = $orderRepo;
		$this->statusRepo = $statusRepo;
	}

	public function orders()
	{
		$status = 'out for delivery';
		$list = $this->orderRepo->status($status);
		
		return View::make('delivery/list', compact('list'));
	}

	public function send($id)
	{
		$status = $this->statusRepo->newStatus();
		$status->order_id = $id;
		$status->status = 'delivered';
		$status->user_id = Auth::user()->id;
		$status->save();

		return Redirect::back();
	}

}
