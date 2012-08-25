<?php

class Create_Donations_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donations', function($table) {
			$table->increments('id');
			$table->string('donator', 250);
			$table->boolean('is_repacked')->default(0);
			$table->integer('package_id')->nullable();
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
		Schema::drop('donations');
	}

}