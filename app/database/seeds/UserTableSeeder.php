<?php

// Composer: "fzaninotto/faker": "v1.3.0"

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		
		$faker = Faker::create();

		$user = new User;
		$user->username = 'admin';
		$user->type_id = UserType::where('slug', 'admin')->first()->id;
		$user->email = 'admin@gmail.com';
		$user->password = 'secret';
		$user->password_confirmation = 'secret';
		$user->confirmation_code = md5(uniqid(mt_rand(), true));
		$user->confirmed = 1;

		$user->save();

		foreach(range(1, 5) as $index)
		{
			$user = new User;
			$user->type_id = UserType::where('slug', 'customer')->first()->id;
			$user->username =  $faker->userName;
			$user->email = $faker->email;
			$user->password = 'secret';
			$user->password_confirmation = 'secret';
			$user->confirmation_code = md5(uniqid(mt_rand(), true));
			$user->confirmed = 1;
			$user->save();
		}
	}
}