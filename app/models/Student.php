<?php

class Student extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'students';
	protected $with = ['user'];

	public function user(){
		return $this->belongsTo('User','created_by','id');
	}



}