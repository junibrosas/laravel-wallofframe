<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfileTableSeeder extends Seeder {

	public function run()
	{
		DB::table('profiles')->delete();
		
		$faker = Faker::create();

		$users = User::all();
		foreach( $users as $user ){
			Profile::create([
				'user_id' => $user->id,
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'mobile_number' => $faker->randomNumber( 11 ),
				'address' => $faker->address,
			]);
		}
		
	}

}