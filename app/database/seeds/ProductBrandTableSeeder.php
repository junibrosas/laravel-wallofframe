<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductBrandTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_brands')->delete();

		$data = ['Dior', 'Louis Vitton', 'Versace', 'Hermes','Prada', 'Chanel','Ralph Lauren', 'Karl Lagerfeld','Oscar De La Renta', 'Giorgio Armani','Alexander Mcqueen', 'Christian Louboutin'];
		foreach($data as $d){
			ProductBrand::create([
				'name' => $d,
				'slug' => Str::slug($d),
				'image' => Str::slug($d).'.jpg'
			]);
		}
	}
}