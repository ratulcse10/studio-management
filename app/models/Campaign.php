<?php

class Campaign extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'campaigns';
	protected $with = ['ad','user'];

	public function getDates(){
		return ['created_at','updated_at','deleted_at','from','to'];
	}

	public function students(){
		return $this->hasMany('Student','campaign_id','id');
	}



	public function ad()
	{
		return $this->belongsTo('AdvertisementType', 'ad_type', 'id');

	}

	public function user(){
		return $this->belongsTo('User','created_by','id');
	}


}