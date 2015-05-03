<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RevenuesTableSeeder extends Seeder {

	public function run()
	{
		$revenues = [
					[
								'created_by'      => 1,
								'revenue'   => '23423.80',
								'month' => 'January',
								'year' => '2015'			
					],
					[
								'created_by'      => 1,
								'revenue'   => '2323.80',
								'month' => 'February',
								'year' => '2015'
					],
					[
								'created_by'      => 1,
								'revenue'   => '23423.80',
								'month' => 'March',
								'year' => '2015'
					]

		];

		DB::table('revenues')->insert($revenues);
	}

}