<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TransactionStatusTableSeeder extends Seeder {

	public function run()
	{
		DB::table('transaction_statuses')->delete();
		$data = ['Processing', 'In Delivery', 'Completed', 'Failed'];
		foreach($data as $d){
			TransactionStatus::create([
				'name' => $d,
				'slug' => Str::slug($d)
			]);
		}
	}
}