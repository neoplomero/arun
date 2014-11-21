<?php namespace Bakery\Entities;

class Status extends \Eloquent {
	
	protected $table = 'status';

	protected $hidden = array('id');

	protected $fillable = array('status', 'order_id', 'user_id','note');
<<<<<<< HEAD


	public function order()
	{
		return $this->belongsTo('Bakery\Entities\Order');
	}
	
=======
>>>>>>> a9be94725565da93483ae462162a3f6d17656327
}