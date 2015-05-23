<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SubscribersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 1) as $index)
		{
			Subscriber::create([
						'first_name' => $faker->firstName,
						'user_id' => 2,
						'last_name' => $faker->lastName,
						'address' => $faker->address,
						'phone' => $faker->phoneNumber,
						'social_security' => "test",
						'gender' => $faker->randomElement(['female','male'])
			]);
		}
	}

}