<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotorbikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('motorbike', function(Blueprint $table)
		{
			$table->string('id', 5)->primary();
			$table->string('name');
			$table->decimal('capacity', 10, 0);
			$table->string('id_motorbike_type', 5)->index('fk_motorbike__motorbike_type');
			$table->string('id_manufacturer', 5)->index('fk_motorbike__manufacturer');
			$table->text('description', 65535);
			$table->text('title', 65535);
			$table->text('short_description', 65535);
			$table->string('thumbnail');
			$table->string('unsigned_title');
			$table->smallInteger('views');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('motorbike');
	}

}
