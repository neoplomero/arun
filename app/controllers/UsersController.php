<?php

use Bakery\Entities\User;
use Bakery\Managers\UserManager;
use Bakery\Repositories\UserRepo;

class UsersController extends BaseController{
	
	protected $userRepo;

	public function __construct(UserRepo $userRepo)
	{

		$this->userRepo = $userRepo;

	}


	//employes list view
	public function usersList()
	{
		$userList = $this->userRepo->getList();
		return View::make('users/list', compact('userList'));
	}

	//employes account information view
	public function view($id)
	{
		$user = $this->userRepo->find($id);
		$this->notFoundUnless($user);

		return View::make('users/view', compact('user'));
	}

	//employes account register form
	public function register()
	{

		$types = ['admin' => 'admin',
					'delivery' => 'delivery',
					'baker' => 'baker',
					'seller'  => 'seller',
					'disabled'  => 'disabled'];

		return View::make('users/register', compact('types'));
	}

	//employes account register
	public function create()
	{

		$user = $this->userRepo->newUser();
		$manager = new UserManager($user, Input::all());
		//verifica si las reglas fueron validadas
		$manager->save();
	
		return Redirect::route('users');
		
	}

	//employs account update form
	public function account($id)
	{
		$user = $this->userRepo->find($id);
		$this->notFoundUnless($user);
		$types = ['admin' => 'admin',
					'delivery' => 'delivery',
					'baker' => 'baker',
					'seller'  => 'seller',
					'disabled'  => 'disabled'];

		return View::make('users/update', compact('user', 'types'));
	}

	//employes account update
	public function update()
	{
		//dd(Input::all());
		$id = Input::get('id');
		$user = $this->userRepo->find($id);
		$manager = new UserManager($user, Input::all());
		//verifica si las reglas fueron validadas
		$manager->save();

		//return View::make('users/view', compact('user'));
		return Redirect::route('users/view', array('id' => $id));

	}
}

?>