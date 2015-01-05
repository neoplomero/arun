<?php    namespace Bakery\Repositories;


use Bakery\Entities\Report;

class ReportRepo extends BaseRepo {

	public function getModel()
	{
		return new Report;
	}

	public function getList()
	{
		return Report::orderBy('id', 'DESC')->paginate(12);
	}
	
	public function newReport()
	{
		$status = new Report();
		return $status;
	}

}

?>