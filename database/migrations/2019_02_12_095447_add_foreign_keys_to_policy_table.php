<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('policy', function(Blueprint $table)
		{
			$table->foreign('id_activity', 'fk_policy__activity')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_entity', 'fk_policy__entity')->references('id')->on('entity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_role', 'fk_policy__role')->references('id')->on('role')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('policy', function(Blueprint $table)
		{
			$table->dropForeign('fk_policy__activity');
			$table->dropForeign('fk_policy__entity');
			$table->dropForeign('fk_policy__role');
		});
	}

}
