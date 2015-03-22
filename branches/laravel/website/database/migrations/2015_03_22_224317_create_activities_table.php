<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function($table){
			$table->increments('id');
			$table->string('title', 255);
			$table->string('description', 255);
			$table->datetime('end_date');
			$table->integer('percent_done');
			$table->text('comments');
			$table->boolean('auto_percent_done');
			$table->integer('activity_type_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('activities');
	}

}
