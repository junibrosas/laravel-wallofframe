<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTypeTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		DB::table('user_types')->delete();

		UserType::create([
			'name' => 'Administrator',
			'slug' => 'admin',
			'description' => ''
		]);

		UserType::create([
			'name' => 'Customer',
			'slug' => 'customer',
			'description' => ''
		]);
	}

}