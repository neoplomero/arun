<?php


use Bakery\Repositories\CustomerRepo;
use Bakery\Managers\CustomerManager;

class CustomersController extends BaseController{
	
	protected $customerRepo;

	public function __construct(CustomerRepo $customerRepo){
		$this->customerRepo = $customerRepo;
	}

	public function customersList()
	{
		$customerList = $this->customerRepo->getList();
		return View::make('customers/list', compact('customerList'));
	}

	public function view($id){
		$customer = $this->customerRepo->find($id);
		$this->notFoundUnless($customer);

		return View::make('customers/view', compact('customer'));
	}
	public function register(){

		$period = array('30 days' => '30 days', '60 days' => '60 days');
		return View::make('customers/register', compact('period'));
	}

	public function create()
	{

		$customer = $this->customerRepo->newCustomer();
		$manager = new CustomerManager($customer, Input::all());
		$manager->save();
	
		return Redirect::route('customers');
		
	}	

	public function account($id)
	{
		$customer = $this->customerRepo->find($id);
		$this->notFoundUnless($customer);
		$period = array('30 days' => '30 days', '60 days' => '60 days');
		return View::make('customers/update', compact('customer', 'period'));
	}
	public function update()
	{
		$id = Input::get('id');
		//dd(Input::get('payment_period'));
		$customer = $this->customerRepo->find($id);
		$this->notFoundUnless($customer);
		$manager = new CustomerManager($customer, Input::all());
		$manager->save();
		return Redirect::route('customers/view', array('id' => $id));

	}
	public function search()
	{
		$search = Input::get('name');
		//dd($search);
		$customerList = $this->customerRepo->search('full_name', $search);
		//$customerList = $this->customerRepo->like('full_name', $search);
		return View::make('customers/list', compact('customerList'));	
	}
}