<?php namespace Bakery\Entities;

use Bakery\Entities\Status;

class Order extends \Eloquent {
	protected $table = 'orders';

	protected $hidden = array('id');

	protected $fillable = array('delivery_address', 'delivery_date', 'customer_id', 'note','ammount', 'order_id');
	

	public function status()
	{
		return $this->hasMany('Bakery\Entities\Status');
	}

	public function detail()
	{
		return $this->hasMany('Bakery\Entities\Detail');
	}

	public function customer()
	{
		return $this->belongsTo('Bakery\Entities\Customer');
	}	
}