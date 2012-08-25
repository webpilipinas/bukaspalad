<?php

class Create_Stocks_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function($table) {
			$table->increments('id');
			$table->string('sku', 250)->unique();
			$table->string('unit', 250);
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
		Schema::drop('stocks');
	}

}