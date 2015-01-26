<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration {

	public function up()
	{
		// Creates the contacts table
		Schema::create('contacts', function ($table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('number');
			$table->string('email');
			$table->string('company');
			$table->string('subject');
			$table->text('message');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}
