<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration {
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('path');
			$table->integer('imageable_id')->unsigned();
			$table->string('imageable_type');
			$table->string('type');
			$table->timestamps();
		});
	}
	public function down()
	{
		Schema::drop('images');
	}
}
