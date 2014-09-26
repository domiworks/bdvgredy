<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('username');
            $table->string('password');
			$table->tinyInteger('role');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user', function (Blueprint $table) {
            $table->drop();
        });
	}

}