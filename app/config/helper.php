<?php


class CustomHelper{

	public static function assignUserRole(User $newUser){
		$user = Role::find(2);
		$read = Permission::find(1);
		$user->attachPermission($read);
		try{
			$newUser->attachRole($user);
			return true;
		}catch(Exception $ex){
			return false;
		}

	}
}