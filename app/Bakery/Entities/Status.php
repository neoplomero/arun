<?php namespace Bakery\Entities;

class Status extends \Eloquent {
	
	protected $table = 'status';

	protected $hidden = array('id');

	protected $fillable = array('status', 'order_id', 'user_id','note');

	public function order()
	{
		return $this->belongsTo('Bakery\Entities\Order');
	}
	
}