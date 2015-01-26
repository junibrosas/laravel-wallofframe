<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductStatusTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_statuses')->delete();
		$data = ['Unpublished', 'Published', 'Sold Out', 'Available', 'Feature', 'New'];
		foreach($data as $d){
			ProductStatus::create([
				'name' => $d,
				'slug' => Str::slug($d),
			]);
		}
	}
}