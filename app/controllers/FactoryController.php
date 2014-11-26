<?php

use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\StatusRepo;

class FactoryController extends \BaseController {

	public $orderRepo;
	public $statusRepo;

	public function __construct(OrderRepo $orderRepo,
								StatusRepo $statusRepo)
	{
		$this->orderRepo = $orderRepo;
		$this->statusRepo = $statusRepo;
	}


	public function processingOrders()
	{

		//$date = date("Y-m-d", strtotime("tomorrow"));
		//$list = $this->orderRepo->statusByFilter('received', 'delivery_date', '=', $date);

		$status = 'processing';
		$list = $this->orderRepo->status($status);

		return View::make('factory/list', compact('list','status'));
	}

	public function productionOrders()
	{

		$status = 'processing';
		//$date = date("Y-m-d", strtotime("tomorrow"));
		$date = date("Y-m-d");
		$orders = $this->orderRepo->byDeliveryDate($date);
		$list = array();
		foreach ($orders as $order) {
			if($order->status->last()->status == 'processing')
			{
				foreach ($order->detail as $detail) {
					if(array_key_exists($detail->product->name, $list)){
						$list[$detail->product->name] = $list[$detail->product->name] + $detail->quantity;
					}else{
					$list[$detail->product->name] = $detail->quantity;
					}
				}
			}
		}
		$orders = array();
		while($element = current($list)) {
		    $product = array('product' => key($list), 'quantity' => $element);
		    array_push($orders, $product);
		    next($list);
		}
		//dd($orders);
		return View::make('factory/production', compact('orders'));

	}


	public function send($id)
	{
		$status = $this->statusRepo->newStatus();
		$status->order_id = $id;
		$status->status = 'out for delivery';
		$status->user_id = Auth::user()->id;
		$status->save();

		return Redirect::back();
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
