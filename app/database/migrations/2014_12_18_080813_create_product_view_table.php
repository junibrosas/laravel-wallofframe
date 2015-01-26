<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductViewTable extends Migration {

	public function up()
	{
		Schema::create('product_views', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('product_id');
			$table->string('ip_address');
			$table->text('info')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_views');
	}

}
