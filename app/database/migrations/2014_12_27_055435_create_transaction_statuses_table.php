<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionStatusesTable extends Migration {

	public function up()
	{
		Schema::create('transaction_statuses', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('transaction_statuses');
	}
}
