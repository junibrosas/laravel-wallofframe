<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductBrandTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_brands')->delete();

		$data = ['Chanel', 'Oscar Dela Renta', 'Prada', 'Ralph Lauren','Alexander Mcqueen', 'Christian Dior','Dior', 'Giordio Armani','Karl Lagerfeld', 'Louboutin','LV'];
		foreach($data as $d){
			ProductBrand::create([
				'name' => $d,
				'slug' => Str::slug($d),
				'image' => Str::slug($d).'.jpg'
			]);
		}
	}
}