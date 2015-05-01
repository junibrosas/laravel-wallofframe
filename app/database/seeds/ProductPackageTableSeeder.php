<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductPackageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_packages')->truncate();

		$frameSizes = [
        [ 'width' => 30, 'height' => 30, 'gloss' => 120, 'matte' => 100],
        ['width' => 40, 'height' => 100, 'gloss' => 150, 'matte' => 130],
        ['width' => 50, 'height' => 50, 'gloss' => 190, 'matte' => 170 ],
        [ 'width' => 60, 'height' => 60, 'gloss' => 150, 'matte' => 130 ],
        [ 'width' => 50, 'height' => 70, 'gloss' => 180, 'matte' => 160 ],
        [ 'width' => 70, 'height' => 70, 'gloss' => 300, 'matte' => 200 ],
        [ 'width' => 100, 'height' => 100, 'gloss' => 400, 'matte' => 300 ],
        [ 'width' => 200, 'height' => 100, 'gloss' => 550, 'matte' => 400]
    	];

		foreach( $frameSizes as $size ){
			ProductPackage::create( $size );
		}
	}

}