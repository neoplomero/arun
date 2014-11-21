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
		$status = 'received';
		$list = $this->orderRepo->status($status);
		//dd($list);
		
		return View::make('delivery/list', compact('list'));
	}



}
