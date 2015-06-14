<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$city_array = [];

		for($i =0 ; $i<5; $i++){
			$city_array[$i] = $faker->city;
		}

		foreach(range(1, 50) as $index)
		{
			Student::create([
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email' => $faker->unique()->email,
				'created_by' => 1,
				'address' => $faker->address,
				'city' => $city_array[$faker->numberBetween(0,4)],
				'zipcode' => $faker->countryCode,
				'state' => $faker->streetName,
				'phone' => $faker->phoneNumber,
				'campaign_id' => 1,
				'dob' => $faker->dateTimeBetween($startDate = '-30 year', $endDate = 'now') ,
				'gender' => $faker->randomElement(['female','male']),
				'created_at' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now')

			]);
		}
	}

}