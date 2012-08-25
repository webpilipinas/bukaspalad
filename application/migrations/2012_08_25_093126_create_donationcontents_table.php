<?php

class Create_Donationcontents_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donationcontents', function($table) {
			$table->increments('id');
			$table->integer('donation_id');
			$table->integer('stock_id');
			$table->integer('amount');
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
		Schema::drop('donationcontents');
	}

}