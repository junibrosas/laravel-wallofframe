<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryTable extends Migration {
	public function up()
	{
		Schema::create('product_categories', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');

			$table->timestamps();
			$table->softDeletes();
		});
	}
	public function down()
	{
		Schema::drop('product_categories');
	}
}
