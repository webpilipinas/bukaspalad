<?php

class Create_Transports_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transports', function($table) {
			$table->increments('id');
			$table->string('name', 250);
			$table->string('car_type', 250);
			$table->integer('package_id')->nullable();
			$table->boolean('is_available')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transports');
	}

}