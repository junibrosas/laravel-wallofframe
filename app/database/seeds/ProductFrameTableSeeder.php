<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductFrameTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_frames')->delete();

		$borderStyles = array(
			'border-style: solid; border-width: 38px 42px;
			border-image-slice:  85 84 84 89;
			border-image-repeat: repeat;',

			'border-style: solid; border-width: 60px;
			border-image-slice: 55 55 55 55;
			border-image-repeat: repeat;',

			'border-style: solid; border-width: 60px;
			border-image-slice: 47 47 47 48;
			border-image-repeat: stretch;',

			'border-style: solid; border-width: 34px 36px 39px 30px;
			border-image-slice: 34;
			border-image-repeat:  stretch;',

			'border-style: solid; border-width: 90px;
			border-image-slice:  164;
			border-image-repeat: stretch;',

			'border-style: solid; border-width: 90px;
			border-image-slice: 164;
			border-image-repeat: stretch;',

			'border-style: solid; border-width: 40px;
			border-image-slice: 70; border-image-repeat: stretch;',


			'border-style: solid; border-width: 90px 80px;
			border-image-slice: 54 54 55 55; border-image-repeat: stretch repeat;',

			'border-style: solid; border-width: 50px;
			border-image-slice: 31; border-image-repeat:stretch;'
		);

		foreach($borderStyles as $i => $borderStyle){
			$frameName = 'Frame ' . ( $i + 1);
			ProductFrame::create([
				'name' => $frameName,
				'slug' => Str::slug($frameName),
				'image' => 'wall-frame'.($i+1).'.jpg',
				'border_style' => $borderStyles[$i],
				'is_active' => 1
			]);
		}
	}
}