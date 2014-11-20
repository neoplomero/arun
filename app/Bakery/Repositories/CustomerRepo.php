<?php



namespace Bakery\Repositories;
use Bakery\Entities\Customer;


class CustomerRepo extends BaseRepo {

	

	public function getModel()
	{
		return new Customer;
	}


	public function getList()
	{
		return Customer::orderBy('full_name','ASC')->paginate(12);
		
	}
	
	public function newCustomer()
	{
		$customer = new Customer();
		
		return $customer;
	}
	public  function search($field, $value)
	{
        //return $query->where($field, 'LIKE', "%$value%");
        //$result = Customer::like($field, $value)->get()->paginate(12);
        $result = Customer::where($field, 'LIKE', "%$value%")->orderBy('full_name', 'ASC')->paginate(12);

        return $result;
	}

}

?>