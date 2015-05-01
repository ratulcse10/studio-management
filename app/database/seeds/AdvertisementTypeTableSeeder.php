<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdvertisementTypeTableSeeder extends Seeder {

	public function run()
	{
		$types = [
					[
								'name'      => 'Newspaper'
					],
					[
								'name'      => 'Television'
					],
					[
								'name'      => 'Facebook'
					]

		];

		DB::table('advertisement_types')->insert($types);
	}

}