<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_packages', function ($table) {
			$table->increments('id');
			$table->integer('width');
			$table->integer('height');
			$table->decimal('gloss', 5, 2);
			$table->decimal('matte', 5, 2);

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_packages');
	}

}
