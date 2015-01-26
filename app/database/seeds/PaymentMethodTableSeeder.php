<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PaymentMethodTableSeeder extends Seeder {

	public function run()
	{
		DB::table('payment_methods')->delete();

		PaymentMethod::create([
			'name' => 'Paypal',
			'slug' => 'paypal',
			'image' => 'paypal.png'
		]);
	}
}