<?php


class Revenue extends \Eloquent {

	protected $table = 'revenues';

	protected $guarded = ['id'];

	protected $with = ['user'];

	public function user(){
		return $this->belongsTo('User','created_by','id');
	}


}
