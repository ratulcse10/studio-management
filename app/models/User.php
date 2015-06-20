<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $guarded = ['id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function subscriber()
	{
		return $this->hasOne('Subscriber','user_id','id');
	}

	public function students(){
		return $this->hasMany('Student','created_by','id');
	}

	public function studioClass(){
		return $this->hasMany('StudioClass','created_by','id');
	}

	public function campaigns(){
		return $this->hasMany('Campaign','created_by','id');
	}

	public function revenues(){
		return $this->hasMany('Revenue','created_by','id');
	}

	public function projects(){
		return $this->hasMany('Project','created_by','id');
	}

}
