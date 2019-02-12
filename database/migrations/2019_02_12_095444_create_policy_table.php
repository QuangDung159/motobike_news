<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policy', function(Blueprint $table)
		{
			$table->string('id_role', 5);
			$table->string('id_activity', 5)->index('fk_policy__activity');
			$table->string('id_entity', 5)->index('fk_policy__entity');
			$table->string('id', 5);
			$table->timestamps();
			$table->primary(['id_role','id_activity','id_entity']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('policy');
	}

}
