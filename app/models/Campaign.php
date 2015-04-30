<?php

class Campaign extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'campaigns';
	protected $with = ['ad'];

	public function getDates(){
		return ['created_at','updated_at','deleted_at','from','to'];
	}



	public function ad()
	{
		return $this->belongsTo('AdvertisementType', 'ad_type', 'id');

	}


}