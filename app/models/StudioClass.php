<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class StudioClass extends \Eloquent {

	protected $table = 'studio_class';

	protected $guarded = ['id'];
	protected $with = ['user'];
	public static function rules($id = 0, $merge = [])
	{
		return array_merge(
					[
								'name' => 'required|unique:advertisement_types'. ($id ? ",id,$id" : '')
					],
					$merge);
	}

	public function user(){
		return $this->belongsTo('User','created_by','id');
	}

}
