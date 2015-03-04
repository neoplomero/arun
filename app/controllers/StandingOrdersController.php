<?php
use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\DetailRepo;
use Bakery\Repositories\StatusRepo;

use Bakery\Managers\OrderManager;
use Bakery\Managers\DetailManager;

class StandingOrdersController extends \BaseController {

	public $orderRepo;
	public $detailRepo;
	public $statusRepo;

	public function __construct(OrderRepo $orderRepo,
								DetailRepo $detailRepo,
								StatusRepo $statusRepo){
 		$this->orderRepo = $orderRepo;
 		$this->detailRepo = $detailRepo;
 		$this->statusRepo = $statusRepo;
	}
	/**
	 * Display a listing of the resource.
	 * GET /standingorders
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /standingorders/create
	 *
	 * @return Response
	 */
	public function createModel($id)
	{
		$base_order = $this->orderRepo->find($id);
		$new_order = $this->cloneOrder($base_order, 'model');

		return Redirect::to('models')->with('response', 'The model order has been created');;
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function createStanding()
	{
		$id = Input::get('order_id');
		$delivery_date = Input::get('delivery_date');
		$order = $this->orderRepo->find($id);
		$standing_order = $this->cloneOrder($order, 'order');
		$standing_order->delivery_date = $delivery_date;
		$standing_order->save();
		$status = $this->setStatus($standing_order->id, 'standing');

		return Redirect::to('standing/list')->with('response','The standing order has been created');
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function setStatus($order_id, $status_text)
	{
		$status = $this->statusRepo->newStatus();
		$status->order_id	= $order_id;
		$status->user_id	= Auth::user()->id;
		$status->status 	= $status_text;
		$status->save();
		return $status;
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function cloneOrder($base_order, $type)
	{
		//$base_order = $this->orderRepo->find($id);
		$new_order = $this->orderRepo->newOrder();
		$new_order->delivery_address	= $base_order->delivery_address;
		$new_order->customer_id			= $base_order->customer_id;
		$new_order->type  				= $type;
		$new_order->amount				= $base_order->amount;
		$new_order->save();

		foreach($base_order->detail as $detail){
			$detail->order_id = $new_order->id;
			$model_detail = $this->detailRepo->newDetail();
			$model_detail->quantity		= $detail->quantity;
			$model_detail->single_price = $detail->single_price;
			$model_detail->total_price	= $detail->total_price;
			$model_detail->order_id		= $new_order->id;
			$model_detail->product_id	= $detail->product_id;
			$model_detail->type 		= $detail->type;
			$model_detail->save();
		}
		return $new_order;
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function models()
	{
		$list = $this->orderRepo->ordersByFilter('type', '=', 'model');
		return View::make('standing/orders',compact('list'));
	}
	/**
	 * Store a newly created resource in storage.
	 * POST /standingorders
	 *
	 * @return Response
	 */
	public function standingList()
	{
		$list = $this->orderRepo->status('standing');
		return View::make('standing/standing', compact('list'));
	}

	/**
	 * Display the specified resource.
	 * GET /standingorders/{id}
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
	 * GET /standingorders/{id}/edit
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
	 * PUT /standingorders/{id}
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
	 * DELETE /standingorders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}