<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;


class AdvertisementType extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'advertisement_types';

	public static function rules($id = 0, $merge = [])
	{
		return array_merge(
					[
								'name' => 'required|unique:advertisement_types'. ($id ? ",id,$id" : '')
					],
					$merge);
	}

	public function campaign()
	{
		return $this->hasOne('Campaign','ad_type','id');
	}



}