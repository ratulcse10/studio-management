<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('EntrustTableSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('AdvertisementTypeTableSeeder');
		$this->call('CampaignsTableSeeder');
		$this->call('StudioClassTableSeeder');
	}

}
