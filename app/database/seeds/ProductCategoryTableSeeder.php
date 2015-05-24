<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductCategoryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_categories')->delete();

		$data = ['Cosmic Quotes', 'Limited Edition', 'Fashion', 'Packages'];
		foreach($data as $d){
			ProductCategory::create([
				'name' => $d,
				'slug' => Str::slug($d)
			]);
		}
	}
}