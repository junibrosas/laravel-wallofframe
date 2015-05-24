<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration {

	public function up()
	{
		Schema::create('attachments', function ($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name');
			$table->string('url');
			$table->string('filename');
			$table->string('mime_type');

			$table->timestamps();
			$table->softDeletes();
		});
	}
	public function down()
	{
		Schema::drop('attachments');
	}
}
