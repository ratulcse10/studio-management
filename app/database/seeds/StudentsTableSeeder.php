<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Student::create([
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email' => $faker->unique()->email,
				'created_by' => 1,
				'address' => $faker->address,
				'city' => $faker->city,
				'zipcode' => $faker->countryCode,
				'state' => $faker->streetName,
				'phone' => $faker->phoneNumber,
				'dob' => $faker->date($format = 'Y-m-d', $max = 'now') ,
				'gender' => $faker->randomElement(['female','male'])

			]);
		}
	}

}