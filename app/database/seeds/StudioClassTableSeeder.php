<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StudioClassTableSeeder extends Seeder {

	public function run()
	{
		$studio_classes = [
					[
								'name'      => 'Ballet 1',
								'start_time' => '08:00:00',
								'room' => 'A',
								'day' => 'Thursday',
								'instructor' => 'Mitcell D Marco',
								'status' => 'Open'
					],
					[
								'name'      => 'Ballet 2',
								'start_time' => '10:00:00',
								'room' => 'A',
								'day' => 'Tuesday',
								'instructor' => 'Mitcell D Marco',
								'status' => 'Closed'
					],
					[
								'name'      => 'Ballet 3',
								'start_time' => '07:00:00',
								'room' => 'C',
								'day' => 'Monday',
								'instructor' => 'Mitcell D Marco',
								'status' => 'Pending'
					]

		];

		DB::table('studio_class')->insert($studio_classes);
	}

}