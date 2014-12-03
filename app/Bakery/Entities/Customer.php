<?php namespace Bakery\Entities;

class Customer extends \Eloquent {
	
	protected $table = 'customers';

	protected $hidden = array('id');

	protected $fillable = array('full_name', 'email', 'delivery_address','invoice_address', 'phone_number','register_number','payment_period');
}