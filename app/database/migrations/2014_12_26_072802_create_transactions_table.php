<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('tracking_number');
			$table->integer('user_id');
			$table->integer('shipping_address_id');
			$table->integer('payment_method_id');
			$table->integer('transaction_status_id');
			$table->decimal('total_amount', 9, 2)->nullable();
			$table->text('products')->nullable();
			$table->text('payment_response')->nullable();

			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}
}
