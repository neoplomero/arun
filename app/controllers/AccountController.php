<?php

/**
* 
*/


use Bakery\Managers\AccountManager;

class AccountController extends BaseController
{

	public function access()
	{

		return View::make('account/login');
	}

	public function profile()
	{

		$user = Auth::user();
		$this->notFoundUnless($user);

		return View::make('account/view', compact('user'));
	}
	public function account()
	{

		$user = Auth::user();
		$this->notFoundUnless($user);

		return View::make('account/update', compact('user'));
	}
	public function update()
	{
		$user = Auth::user();
		$manager = new AccountManager($user, Input::all());
		//verifica si las reglas fueron validadas
		$manager->save();

		return Redirect::route('profile');
	}
}