<?php

class Create_Packages_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('packages', function($table) {
			$table->increments('id');
			$table->string('area', 250);
			$table->integer('packs')->default(0);
			$table->integer('transport_id')->nullable();
			$table->boolean('is_transported')->default(0);
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
		Schema::drop('packages');
	}

}