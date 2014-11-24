<?php

use Bakery\Repositories\OrderRepo;

class AdminController extends \BaseController {

	public $orderRepo;

	public function __construct(OrderRepo $orderRepo)
	{
		$this->orderRepo = $orderRepo;

	}




}
