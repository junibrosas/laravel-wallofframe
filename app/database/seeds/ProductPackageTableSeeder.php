<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductPackageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_packages')->truncate();

		$frameSizes = [
        [ 'order' => 1, 'width' => 30, 'height' => 30, 'price' => 120],
        [ 'order' => 2, 'width' => 40, 'height' => 100, 'price' => 150],
        [ 'order' => 3, 'width' => 50, 'height' => 50, 'price' => 190],
        [ 'order' => 4, 'width' => 60, 'height' => 60, 'price' => 150],
        [ 'order' => 5, 'width' => 50, 'height' => 70, 'price' => 180 ],
        [ 'order' => 6, 'width' => 70, 'height' => 70, 'price' => 300],
        [ 'order' => 7, 'width' => 100, 'height' => 100, 'price' => 400],
        [ 'order' => 8, 'width' => 200, 'height' => 100, 'price' => 550]
    	];

		foreach( $frameSizes as $size ){

			ProductPackage::create( $size );


		}
	}

}