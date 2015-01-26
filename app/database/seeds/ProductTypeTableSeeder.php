<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductTypeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_types')->delete();
		$data = ['Glass', 'Wooden', 'Plastic'];
		foreach($data as $d){
			ProductType::create([
				'name' => $d,
				'slug' => Str::slug($d)
			]);
		}
	}
}