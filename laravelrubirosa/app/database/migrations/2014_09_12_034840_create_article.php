<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;
class CreateArticle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('title');
			$table->dateTime('created_time');
            $table->longText('content');
            $table->string('photo');
        });
		
		DB::table('article')->insert(
			array(
				'title' => 'Cleaning Tips',
				'created_time' => Carbon::now(),
				'content' => 'Cleaning Tips'
				
			)
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article', function (Blueprint $table) {
            $table->drop();
        });
	}

}