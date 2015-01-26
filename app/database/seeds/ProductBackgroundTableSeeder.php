<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductBackgroundTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_backgrounds')->delete();
		$data = ['Background 1', 'Background 2', 'Background 3','Background 4', 'Background 5', 'Background 6'];
		foreach($data as $i => $d){
			ProductBackground::create([
				'name' => $d,
				'slug' => Str::slug($d),
				'image' => 'bg'.($i+1).'.jpg',
				'is_active' => 1
			]);
		}
	}

}