<?php namespace Bakery\Entities;

class Bakery extends \Eloquent {

	protected $table = 'bakery';

	protected $hidden = array('id');

	protected $fillable = array('name', 'email', 'address','register_number', 'phone_number');

}