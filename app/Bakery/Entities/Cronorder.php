<?php namespace Bakery\Entities;

class Cronorder extends \Eloquent {

	protected $table = 'cronorders';

	protected $hidden = array('id');

	protected $fillable = array('order_id', 'interval');

	public function order(){
		return $this->belongsTo('Bakery\Entities\Order');
	}
}