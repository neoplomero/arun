<?php


class HomeController extends BaseController {

	public function __construct()
	{

	}

	public function index()
	{
		if (Auth::user()){
			$full_name = explode(' ', Auth::user()->full_name);
			$name=$full_name[0];
			View::share('name', $name);
		}
		return View::make('home');
	}

}
