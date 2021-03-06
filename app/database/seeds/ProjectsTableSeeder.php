<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Project::create([
						'title' => $faker->text(50),
						'description' => $faker->paragraph(4,true),
						'created_by'  => 1

			]);
		}
	}

}