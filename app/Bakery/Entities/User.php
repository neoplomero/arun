<?php namespace Bakery\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Relations\Relation;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $perPage = 10;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token', 'id');

	protected $fillable = array('full_name', 'email', 'password','address', 'phone_number','register_number','bank_account','user_type');

	

	public function setPasswordAttribute($value)
	{
		if ( ! empty ($value) )
		{
			$this->attributes['password'] = \Hash::make($value);	
		}
		
	}


}
