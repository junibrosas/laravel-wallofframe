<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipping_addresses', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('mobile_number');
			$table->string('address', 1000);
			$table->string('landmark', 1000);

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
		Schema::drop('shipping_addresses');
	}

}
