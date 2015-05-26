<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EntrustTableSeeder extends Seeder {

	public function run()
	{
		$developer = Role::find(1);
		$user = Role::find(2);

		//$read = Permission::find(1);
		$permissions = Permission::all();

		foreach($permissions as $permission){
			$developer->attachPermission($permission);
		}


		/*$developer->attachPermission($read);
		$user->attachPermission($read);*/


		$user1 = User::find(1);
		$user2 = User::find(2);
		$user3 = User::find(3);


		$user1->attachRole($developer);
		$user2->attachRole($user);
		$user3->attachRole($user);
		CustomHelper::assignUserPermission($user3,Permission::all()->lists('id'));
	}

}