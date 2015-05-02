<?php

class Subscriber extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'subscribers';

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');

	}
	protected $with = ['user'];
}