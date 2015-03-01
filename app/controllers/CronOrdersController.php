<?php

/**
* 
*/

use Bakery\Managers\ProductManager;
use Bakery\Managers\CronorderManager;
use Bakery\Repositories\ProductRepo;
use Bakery\Repositories\CronRepo;
//use Faker\Factory as Faker;

class CronOrdersController extends BaseController
{
	protected $productRepo;
	protected $cronRepo;

	public function __construct(ProductRepo $productRepo,
								CronRepo $cronRepo){
		$this->productRepo = $productRepo;
		$this->cronRepo = $cronRepo;
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function set()
	{
		
		$cron = $this->cronRepo->newCron();
		$data['order_id'] = Input::get('order_id');
		$data['interval'] = Input::get('interval');
		$manager = new CronorderManager($cron, $data);
		$manager->save();
		$response = 'The invoice interval has been set';
		return Redirect::to('cron/list');
		
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function cronList()
	{
		$list = $this->cronRepo->getList();
		return View::make('cron/list', compact('list'));
	}


	public function fire($job, $data){
		$product = $this->productRepo->newProduct();
		$manager = new ProductManager($product, $data);
		$manager->save();
		$job->delete();

	}

}