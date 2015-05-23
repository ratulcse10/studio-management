<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EntrustTableSeeder extends Seeder {

	public function run()
	{
		$admin = Role::find(1);
		$user = Role::find(2);

		//$read = Permission::find(1);
		$permissions = Permission::all();

		foreach($permissions as $permission){
			$admin->attachPermission($permission);
		}


		/*$admin->attachPermission($read);
		$user->attachPermission($read);*/


		$user1 = User::find(1);
		$user2 = User::find(2);


		$user1->attachRole($admin);
		$user2->attachRole($user);
	}

}