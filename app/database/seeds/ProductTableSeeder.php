<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder {

	public function run()
	{
		DB::table('products')->delete();
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			$title = $faker->sentence(1);
			Product::create([
				'status_id' => ProductStatus::whereIn('slug', ['new', 'feature'])->orderBy(DB::raw('rand()'))->first()->id,
				'type_id' => ProductType::orderby(DB::raw('rand()'))->first()->id,
				'category_id' => ProductCategory::orderby(DB::raw('rand()'))->first()->id,
				'brand_id' => ProductBrand::orderby(DB::raw('rand()'))->first()->id,
				'title' => $title,
				'content' => $faker->text(500),
				'excerpt' => $faker->text(200),
				'slug' => Str::slug($title),
				'price' => $faker->randomFloat(2, 50, 500),
				'width' => $faker->randomNumber(3),
				'height' => $faker->randomNumber(3),
				'is_available' => 1,
			]);
		}
	}
}