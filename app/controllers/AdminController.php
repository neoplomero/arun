<?php

use Bakery\Repositories\OrderRepo;

class AdminController extends \BaseController {

	public $orderRepo;

	public function __construct(OrderRepo $orderRepo)
	{
		$this->orderRepo = $orderRepo;

	}

	public function pdf()
	{
		$data = 'hola mundo';
		
		$view = View::make('pdf/invoice', compact('data'))->render();
		return PDF::load($view, 'A4', 'portrait')->show();
	}



}
