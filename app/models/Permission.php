<?php
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{


	protected $fillable = ['name','display_name'];
	protected $table = 'permissions';

	public static function rules($id = 0, $merge = [])
	{
		return array_merge(
					[
								'name' => 'required|unique:permissions'. ($id ? ",id,$id" : '')
					],
					$merge);
	}
}