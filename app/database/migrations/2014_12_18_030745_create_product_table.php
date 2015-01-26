<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {
	public function up()
	{
		// Creates the contacts table
		Schema::create('products', function ($table) {

			$table->increments('id');
			$table->integer('status_id');
			$table->integer('type_id');
			$table->integer('category_id');
			$table->integer('brand_id');
			$table->string('title');
			$table->text('content');
			$table->string('excerpt');
			$table->string('slug');
			$table->decimal('price', 5, 2);
			$table->string('width');
			$table->string('height');
			$table->boolean('is_available');
			$table->integer('views');
			$table->text('image');
			$table->enum('image_type', ['square', 'horizontal', 'vertical']);
			$table->enum('image_original_type', ['square', 'horizontal', 'vertical']);

			$table->timestamps();
			$table->softDeletes();
		});
	}
	public function down()
	{
		Schema::drop('products');
	}
}
