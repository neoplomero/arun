<?php namespace Bakery\Repositories;


use Bakery\Entities\Customer;


class CustomerRepo extends BaseRepo {

	

	public function getModel()
	{
		return new Customer;
	}


	public function getList()
	{
		return Customer::paginate(12);
		
	}
	
	public function newCustomer()
	{
		$customer = new Customer();
		
		return $customer;
	}

}

?>