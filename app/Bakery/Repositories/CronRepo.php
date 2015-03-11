<?php    namespace Bakery\Repositories;


use Bakery\Entities\Cronorder;

class CronRepo extends BaseRepo {

	public function getModel()
	{
		return new Cronorder;
	}

	public function getList()
	{

		return Cronorder::paginate(12);

	}
	
	public function newCron()
	{
		$status = new Cronorder();
		return $status;
	}

	public function getLast(){
		$status = Cronorder::orderBy('id', 'DESC')->first();
		return $status;
	}

	public function getLastByUserId($id){
		$order = Cronorder::where('user_id', '=' , $id)->orderBy('id', 'DESC')->first();
		return $order;
	}

}

?>