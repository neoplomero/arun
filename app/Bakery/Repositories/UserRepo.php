<?php    namespace Bakery\Repositories;


use Bakery\Entities\User;

class UserRepo extends BaseRepo {

	public function getModel()
	{
		return new User;
	}
    public function getList()
	{

		return User::paginate(12);

	}
	public function newUser()
	{
		$user = new User();
		$user->password = '12345';
		return $user;
	}

}

?>