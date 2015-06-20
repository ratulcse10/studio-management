<?php

class Project extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'projects';

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');

	}
	protected $with = ['user'];
}