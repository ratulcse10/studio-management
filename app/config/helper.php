<?php


class CustomHelper{

	public static function assignRole(User $newUser,$role_id){

		try{
			$user = Role::find($role_id);
			$newUser->attachRole($user);

			return true;
		}catch(Exception $ex){
			return false;
		}

	}

	public static function assignUserPermission(User $newUser,$permissions){

		try{
			DB::table('permission_user')->where('user_id', $newUser->id)->delete();
			foreach($permissions as $permission){
				DB::table('permission_user')->insert(
							array('permission_id' => $permission, 'user_id' => $newUser->id)
				);
			}

			return true;
		}catch(Exception $ex){
			return false;
		}

	}

	public static function getUserPermissions($user_id){
		try{
			return DB::table('permission_user')->where('user_id', '=',$user_id)->lists('permission_id');
		}catch(Exception $ex){
			return false;
		}

	}

	public static function userHasPermission(User $user,$permissions){
		if($user->hasRole(Config::get('customConfig.roles.admin'))){
			return true;
		}
		$getUserPermissions = DB::table('permission_user')->where('user_id', '=',$user->id)->lists('permission_id');
		$allPermissions = Permission::all()->lists('id','name');
		$results = array_intersect($allPermissions, $getUserPermissions);

		foreach($permissions as $permission){

			if(array_key_exists($permission, $results)){
				return true;
			}
		}

		return false;


	}
}