<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGallery extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('category', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('name');
            $table->string('desktop_thumbnail');
            $table->string('phone_thumbnail');
            $table->tinyInteger('gender');
        });
		
		Schema::table('product', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('name');
			$table->integer('id_category')->unsigned();
			$table->integer('price');
			$table->longText('description');
			$table->string('photo');
			$table->string('hex1');
			$table->string('hex2');
			$table->string('hex3');
			
			$table->foreign('id_category')->references('id')->on('category');
        });
		
		Schema::table('gallery', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('id_product')->unsigned();
            $table->string('photo');
			
			$table->foreign('id_product')->references('id')->on('product');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gallery', function (Blueprint $table) {
            $table->drop();
        });
	}

}