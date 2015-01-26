<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBackgrounds extends Migration {

	public function up()
	{
		Schema::create('product_backgrounds', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('image');
			$table->boolean('is_active');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('product_backgrounds');
	}

}
