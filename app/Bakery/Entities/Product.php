<?php namespace Bakery\Entities;

class Product extends \Eloquent {
	protected $table = 'products';

	protected $hidden = array('id');

	protected $fillable = array('name', 'description','price');

	public function detail()
	{
		return $this->belongsTo('Bakery\Entities\Detail');
	}
}