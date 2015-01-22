<?php namespace Bakery\Entities;

class Detail extends \Eloquent {

	protected $table = 'details';

	protected $hidden = array('id');

	protected $fillable = array('quantity', 'single_price', 'total_price','order_id', 'product_id','type');

	public function product(){
		return $this->belongsTo('Bakery\Entities\Product');
	}
	public function order(){
		return $this->belongsTo('Bakery\Entities\Order');
	}
}