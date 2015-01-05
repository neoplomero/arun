<?php namespace Bakery\Entities;

class Report extends \Eloquent {
	protected $table = 'reports';

	protected $hidden = array('id');

	protected $fillable = array('from', 'to');

}