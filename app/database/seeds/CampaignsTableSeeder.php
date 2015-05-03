<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CampaignsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			$time = $faker->unixTime;
			$to= Carbon::createFromTimeStamp($time)->addDays($faker->numberBetween(1,1000));
			$from = Carbon::createFromTimeStamp($time);
			$copy = $faker->numberBetween(1,1000);
			$ad_type = $faker->numberBetween(1,3)*5;
			Campaign::create([
				'name' => $faker->company,
				'from' => $from,
				'to'    => $to,
				'ad_type' => $faker->numberBetween(1,3),
				'total_copies' => $copy,
				'cost'  => $copy*$ad_type,
				'created_by' => 1
			]);
		}
	}

}