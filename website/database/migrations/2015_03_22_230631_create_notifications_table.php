<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function($table){
			$table->increments('id');
			$table->string('simple_alert_msg', 255);
			$table->integer('simple_alert_tl');
			$table->string('critical_alert_msg', 255);
			$table->integer('critical_alert_tl');
			$table->string('end_activity_msg', 255);
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
		Schema::dropIfExists('notifications');
	}

}
