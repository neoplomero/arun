<?php    namespace Bakery\Repositories;


use Bakery\Entities\Status;

class StatusRepo extends BaseRepo {

	public function getModel()
	{
		return new Status;
	}

	public function getList()
	{

		return Status::paginate(12);

	}
	
	public function newStatus()
	{
		$status = new Status();
		return $status;
	}

	public function getLast(){
		$status = Status::orderBy('id', 'DESC')->first();
		return $status;
	}

	public function getLastByUserId($id){
		$order = Status::where('user_id', '=' , $id)->orderBy('id', 'DESC')->first();
		return $order;
	}

	public function order(){
		return $this->belongsTo('Bakery\Entities\Order');
	}

}

?>