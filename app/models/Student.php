<?php

class Student extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'students';
	protected $with = ['user'];
	protected $dates = ['dob'];
	protected $appends = array('age');

	public function user(){
		return $this->belongsTo('User','created_by','id');
	}

	public function campaign(){
		return $this->belongsTo('Campaign','campaign_id','id');
	}

	public function getAgeAttribute($value)
	{
		return $this->dob->age;
	}



}