<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodsTable extends Migration {

	public function up()
	{
		Schema::create('payment_methods', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug');
			$table->string('name');
			$table->string('image');

			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('payment_methods');
	}

}
