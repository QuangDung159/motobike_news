<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comment', function(Blueprint $table)
		{
			$table->foreign('id_motorbike', 'fk_comment__motorbike')->references('id')->on('motorbike')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_user', 'fk_comment__user')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comment', function(Blueprint $table)
		{
			$table->dropForeign('fk_comment__motorbike');
			$table->dropForeign('fk_comment__user');
		});
	}

}
