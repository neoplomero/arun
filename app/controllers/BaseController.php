<?php
//require 'vendor/autoload.php';
use Carbon\Carbon;
class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function notFoundUnless($value)
	{
		if ( ! $value ) App::abort(404);
	}

	public	function getRandomColor() {
    //$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    //$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
		$color = rand(100,299).','.rand(100,299).','.rand(100,299);
    return $color;
	}

}
