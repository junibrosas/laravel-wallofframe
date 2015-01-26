<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductFrameTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_frames')->delete();
		$data = ['Frame 1', 'Frame 2', 'Frame 3','Frame 4', 'Frame 5', 'Frame 6'];
		foreach($data as $i => $d){
			ProductFrame::create([
				'name' => $d,
				'slug' => Str::slug($d),
				'image' => ($i+1).'.jpg',
				'is_active' => 1
			]);
		}
	}

}