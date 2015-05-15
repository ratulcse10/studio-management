<?php
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $guarded = ['id'];
	protected $table = 'roles';

	public static function rules($id = 0, $merge = [])
	{
		return array_merge(
					[
								'name' => 'required|unique:roles'. ($id ? ",id,$id" : '')
					],
					$merge);
	}
}