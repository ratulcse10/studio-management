<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		$permissions = [
					'dashboard_view' => "Dashboard",
					'student_view' => "Students",
					'class_view' => "Classes",
					'marketing_view' => "Marketing",
					'user_view' => "Users",
					'finance_view' => "Finances",
					'advance_search_view' => "Advance Search"
		];

		foreach($permissions as $permission_name => $display_name)
		{
			Permission::create([
				'name' => $permission_name,
				'display_name' => $display_name
			]);
		}
	}

}