<?php

class Create_Actions_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actions', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->text('message');
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
		Schema::drop('actions');
	}

}