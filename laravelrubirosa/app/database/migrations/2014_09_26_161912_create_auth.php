<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuth extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('auth', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
			$table->tinyInteger('role');
			$table->tinyInteger('aktif');
        });
		
		Schema::table('dokter', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
			$table->integer('user_id')->unsigned();
            $table->string('nama');
            $table->string('spesialisasi');
			
			/*
			
				Foreign
			
			*/
			$table->foreign('user_id')->references('id')->on('auth');
			
			/*
			
				End of foreign
			
			*/
        });
		
		Schema::table('pasien', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->string('nomor_kartu')->unique();
            $table->string('nama');
            $table->string('jalan');
            $table->string('kota');
			$table->date('tanggal_lahir');
            $table->string('foto')->nullable();
			
			/*
			
				Foreign
			
			*/
			$table->foreign('user_id')->references('id')->on('auth');
			
			/*
			
				End of foreign
			
			*/
        });
		
		
		Schema::table('rekam_medis', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
			$table->date('tanggal');
            $table->integer('id_dokter')->unsigned();
            $table->integer('id_pasien')->unsigned();
			$table->longText('diagnosis');
			
			/*
			
				Foreign
			
			*/
			$table->foreign('id_dokter')->references('id')->on('dokter');
			$table->foreign('id_pasien')->references('id')->on('pasien');
			
			/*
			
				End of foreign
			
			*/
			
        });
		
		Schema::table('daftar_obat', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('id_kunjungan')->unsigned();
			$table->string('nama');
			$table->foreign('id_kunjungan')->references('id')->on('rekam_medis');
        });
		
		Schema::table('alergi', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('id_pasien')->unsigned();
			$table->string('alergi');
			
			/*
			
				Foreign
			
			*/
			
			$table->foreign('id_pasien')->references('id')->on('pasien');
			
			/*
			
				End of foreign
			
			*/
			
        });
		
		
		
		Schema::table('tipe_jaskes', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('kode');
            $table->string('tipe');
			$table->string('jenis');
			
        });
		
		Schema::table('tipe_kantor_bpjs', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
			$table->string('tipe');
        });
		
		Schema::table('jaskes', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('tipe')->unsigned();
			$table->string('nama');
			$table->string('alamat');
			$table->string('kabupaten')->nullable();
			$table->string('kecamatan')->nullable();
			$table->string('kota');
			$table->string('telepon')->nullable();
			$table->integer('divre');
			$table->string('kelas')->nullable();
			$table->string('long')->nullable();
			$table->string('lat')->nullable();
			$table->tinyInteger('ugd')->nullable();
			
			
			/*
			
				Foreign
			
			*/
			
			$table->foreign('tipe')->references('id')->on('tipe_jaskes');
			/*
			
				End of foreign
			
			*/
        });
		
		Schema::table('tunggu_pasien', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('id_dokter')->unsigned();
            $table->integer('id_pasien')->unsigned();
            $table->integer('id_jaskes')->unsigned();
			$table->date('tanggal');
			$table->time('jam');
			$table->integer('nomor_antrian');
			$table->tinyInteger('selesai')->default(0);
			
			/*
			
				Foreign
			
			*/
			
			$table->foreign('id_dokter')->references('id')->on('dokter');
			$table->foreign('id_pasien')->references('id')->on('pasien');
			$table->foreign('id_jaskes')->references('id')->on('jaskes');
			
			/*
			
				End of foreign
			
			*/
			
        });
		
		Schema::table('kantor_bpjs', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('tipe')->unsigned();
			$table->string('cabang');
			$table->string('alamat');
			$table->string('kota');
			$table->string('zip')->nullable();
			$table->string('telepon')->nullable();
			$table->string('fax')->nullable();
			$table->integer('hotline')->nullable();
			$table->string('long')->nullable();
			$table->string('lat')->nullable();
			
			/*
			
				Foreign
			
			*/
			
			$table->foreign('tipe')->references('id')->on('tipe_kantor_bpjs');
			/*
			
				End of foreign
			
			*/
			
        });
		
		Schema::table('jadwal_jaga', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('id_dokter')->unsigned();
            $table->integer('id_fasilitas')->unsigned();
			$table->string('hari');
			$table->time('jam_mulai');
			$table->time('jam_selesai');
			
			/*
			
				Foreign
			
			*/
			
			$table->foreign('id_dokter')->references('id')->on('dokter');
			$table->foreign('id_fasilitas')->references('id')->on('jaskes');
			
			/*
			
				End of foreign
			
			*/
			
        });
		
		Schema::table('review', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('id_pasien')->unsigned();
            $table->integer('id_fasilitas')->unsigned();
			$table->integer('rating');
			$table->longText('review');
			
			/*
			
				Foreign
			
			*/
			
			$table->foreign('id_pasien')->references('id')->on('pasien');
			$table->foreign('id_fasilitas')->references('id')->on('jaskes');
			
			/*
			
				End of foreign
			
			*/
			
        });
		
		Schema::table('taxi', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('nama');
            $table->string('telepon');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table('auth', function (Blueprint $table) {
            $table->drop();
        });
	}

}