<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStatusTable extends Migration {


	public function up()
	{
		Schema::create('product_statuses', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('product_statuses');
	}

}
