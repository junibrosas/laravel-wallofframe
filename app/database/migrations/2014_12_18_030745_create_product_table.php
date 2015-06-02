<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {
	public function up()
	{
		// Creates the contacts table
		Schema::create('products', function ($table) {

			$table->increments('id');
			$table->integer('attachment_id');
			$table->integer('status_id');
			$table->integer('type_id');
			$table->string('category_id');
			$table->integer('brand_id');
			$table->string('title');
			$table->text('content');
			$table->string('slug');
			$table->string('filename');
			$table->boolean('is_available');
			$table->timestamps();
			$table->softDeletes();
		});
	}
	public function down()
	{
		Schema::drop('products');
	}
}
