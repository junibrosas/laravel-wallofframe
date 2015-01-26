<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductBrandTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_brands')->delete();
		$faker = Faker::create();

		ProductBrand::create([
			'name' => 'Dior',
			'slug' => 'dior',
			'description' => '',
			'image' => 'dior.png'
		]);

		ProductBrand::create([
			'name' => 'Louis Vitton',
			'slug' => 'louis-vitton',
			'description' => '',
			'image' => 'louis-vitton.png'
		]);

		ProductBrand::create([
			'name' => 'Versace',
			'slug' => 'versace',
			'description' => '',
			'image' => 'versace.png'
		]);

		ProductBrand::create([
			'name' => 'Hermes',
			'slug' => 'hermes',
			'description' => '',
			'image' => 'hermes.png'
		]);

		ProductBrand::create([
			'name' => 'Prada',
			'slug' => 'prada',
			'description' => '',
			'image' => 'prada.png'
		]);

		ProductBrand::create([
			'name' => 'Chanel',
			'slug' => 'chanel',
			'description' => '',
			'image' => 'chanel.png'
		]);
	}
}