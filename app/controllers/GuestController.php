<?php
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


class GuestController extends BaseController
{
	public $customerRepo;
	public $bakeryRepo;
	public $orderRepo;
	public $productRepo;
	public $detailRepo;

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

	public function invoice($id)
	{
		$id = Hashids::decode($id);
		$data = $this->orderRepo->find($id[0]);
		$bakery = $this->bakeryRepo->find(1);
		$view = View::make('pdf/single_invoice', compact('data','bakery'))->render();
		$headers = array('Content-Type' => 'application/pdf');
		return Response::make(PDF::load($view, 'A4', 'portrait')->show('invoice'), 200, $headers);

	}
}