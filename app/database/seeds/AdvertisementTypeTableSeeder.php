<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdvertisementTypeTableSeeder extends Seeder {

	public function run()
	{
		$users = [
					[
								'name'      => 'Name1'
					],
					[
								'name'      => 'Name2'
					],
					[
								'name'      => 'Name3'
					]

		];

		DB::table('advertisement_types')->insert($users);
	}

}