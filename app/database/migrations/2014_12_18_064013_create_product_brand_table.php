<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBrandTable extends Migration {


	public function up()
	{
		Schema::create('product_brands', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('description', 500);
			$table->string('image');

			$table->timestamps();
			$table->softDeletes();
		});
	}


	public function down()
	{
		Schema::drop('product_brands');
	}

}
