<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMotorbikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('motorbike', function(Blueprint $table)
		{
			$table->foreign('id_manufacturer', 'fk_motorbike__manufacturer')->references('id')->on('manufacturer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_motorbike_type', 'fk_motorbike__motorbike_type')->references('id')->on('motorbike_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('motorbike', function(Blueprint $table)
		{
			$table->dropForeign('fk_motorbike__manufacturer');
			$table->dropForeign('fk_motorbike__motorbike_type');
		});
	}

}
