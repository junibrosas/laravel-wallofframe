<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductPackageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('product_packages')->truncate();


		// Set of sizes for all categories
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

		// Set of sizes exclusively for limited edition category
		$categoryID = ProductCategory::where('slug', 'limited-edition')->first()->id;
		$data = array(
			['width' => 30, 'height' => 30, 'price' => 380],
			['width' => 40, 'height' => 50, 'price' => 480],
			['width' => 40, 'height' => 80, 'price' => 580],
			['width' => 40, 'height' => 100, 'price' => 630],
			['width' => 60, 'height' => 60, 'price' => 530],
			['width' => 50, 'height' => 70, 'price' => 730],
			['width' => 70, 'height' => 70, 'price' => 880],
			['width' => 100, 'height' => 100, 'price' => 1050],
			['width' => 200, 'height' => 100, 'price' => 1550],
			['width' => 200, 'height' => 200, 'price' => 2550],
		);
		foreach($data as $i => $each){
			ProductPackage::create([
				'category_id' => $categoryID,
				'width' => $each['width'],
				'height' => $each['height'],
				'price'=> $each['price'],
				'order' => ($i + 1)
			]);
		}
	}

}