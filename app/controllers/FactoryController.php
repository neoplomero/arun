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

	public function receivedOrders()
	{
		$status = 'received';
		$list = $this->orderRepo->status($status);
		return View::make('factory/list', compact('list','status'));
	}

	public function processingOrders()
	{
		$status = 'processing';
		$list = $this->orderRepo->status($status);
		return View::make('factory/list', compact('list','status'));
	}

	public function receivedSearch()
	{
		$date = Input::get('delivery_date');
		$list = $this->orderRepo->statusByFilter('received', 'delivery_date', '=', $date);
		return View::make('factory/list', compact('list'));
	}


	public function process($id)
	{
		$status = $this->statusRepo->newStatus();
		$status->order_id = $id;
		$status->status = 'processing';
		$status->user_id = Auth::user()->id;
		$status->save();

		return Redirect::back();

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
