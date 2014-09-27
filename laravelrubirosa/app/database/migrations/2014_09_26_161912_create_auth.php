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
			$table->string('foto')->nullable();
			
			
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
		
		
		//------------------ INSERT ------------------
		
		//insert auth
		DB::table('auth')->insert(
			array(
				'username' => 'dokter1',
				'password' => 'dokter1',
				'role' => 2,
				'aktif' => 1
			)
		);
		DB::table('auth')->insert(
			array(
				'username' => 'pasien1',
				'password' => 'pasien1',
				'role' => 1,
				'aktif' => 1
			)
		);
		DB::table('auth')->insert(
			array(
				'username' => 'pasien2',
				'password' => 'pasien2',
				'role' => 1,
				'aktif' => 1
			)
		);
		DB::table('auth')->insert(
			array(
				'username' => 'pasien3',
				'password' => 'pasien3',
				'role' => 1,
				'aktif' => 1
			)
		);
		
		//insert dokter
		DB::table('dokter')->insert(
			array(
				'user_id' => 1,
				'nama' => 'nama dokter1',
				'spesialis' => 'spesialis dokter1'
			)
		);
		
		//insert pasien
		DB::table('pasien')->insert(
			array(
				'user_id' => 2,
				'nomor_kartu' => 'nomor_kartu pasien1',
				'nama' => 'nama pasien1',
				'jalan' => 'jalan pasien1',
				'kota' => 'kota pasien1',
				'tanggal_lahir' => '2014-09-15'				
			)
		);
		DB::table('pasien')->insert(
			array(
				'user_id' => 3,
				'nomor_kartu' => 'nomor_kartu pasien2',
				'nama' => 'nama pasien2',
				'jalan' => 'jalan pasien2',
				'kota' => 'kota pasien2',
				'tanggal_lahir' => '2014-09-15'				
			)
		);
		DB::table('pasien')->insert(
			array(
				'user_id' => 4,
				'nomor_kartu' => 'nomor_kartu pasien3',
				'nama' => 'nama pasien3',
				'jalan' => 'jalan pasien3',
				'kota' => 'kota pasien3',
				'tanggal_lahir' => '2014-09-15'				
			)
		);
		
		//insert rekam_medis
		DB::table('rekam_medis')->insert(
			array(
				'tanggal' => '2014-09-15',
				'id_dokter' => 1,
				'id_pasien' => 2,
				'diagnosis' => 'diagnosis pasien1 oleh dokter1'
			)
		);
		DB::table('rekam_medis')->insert(
			array(
				'tanggal' => '2014-09-15',
				'id_dokter' => 1,
				'id_pasien' => 3,
				'diagnosis' => 'diagnosis pasien2 oleh dokter1'
			)
		);
		DB::table('rekam_medis')->insert(
			array(
				'tanggal' => '2014-09-15',
				'id_dokter' => 1,
				'id_pasien' => 4,
				'diagnosis' => 'diagnosis pasien3 oleh dokter1'
			)
		);
		
		//insert daftar_obat
		DB::table('daftar_obat')->insert(
			array(
				'id_kunjungan' => '1',
				'nama' => 'obat untuk pasien1'
			)
		);
		DB::table('daftar_obat')->insert(
			array(
				'id_kunjungan' => '2',
				'nama' => 'obat untuk pasien2'
			)
		);
		DB::table('daftar_obat')->insert(
			array(
				'id_kunjungan' => '3',
				'nama' => 'obat untuk pasien3'
			)
		);
		
		//insert alergi
		DB::table('alergi')->insert(
			array(
				'id_pasien' => 1,
				'alergi' => 'alergi pasien1'
			)
		);
		DB::table('alergi')->insert(
			array(
				'id_pasien' => 2,
				'alergi' => 'alergi pasien2'
			)
		);
		DB::table('alergi')->insert(
			array(
				'id_pasien' => 3,
				'alergi' => 'alergi pasien3'
			)
		);
		
		//insert tunggu_pasien
		DB::table('tunggu_pasien')->insert(
			array(
				'id_dokter' => 1,
				'id_pasien' => 1,
				'id_jaskes' => 1,
				'tanggal' => '2014-09-15',
				'jam' => '12:12:12',
				'nomor_antrian' => '1'
			)
		);
		DB::table('tunggu_pasien')->insert(
			array(
				'id_dokter' => 1,
				'id_pasien' => 2,
				'id_jaskes' => 1,
				'tanggal' => '2014-09-15',
				'jam' => '12:12:12',
				'nomor_antrian' => '2'
			)
		);
		DB::table('tunggu_pasien')->insert(
			array(
				'id_dokter' => 1,
				'id_pasien' => 3,
				'id_jaskes' => 1,
				'tanggal' => '2014-09-15',
				'jam' => '12:12:12',
				'nomor_antrian' => '3'
			)
		);
		
		//insert jadwal_jaga
		DB::table('jadwal_jaga')->insert(
			array(
				'id_dokter' => 1,
				'id_fasilitas' => 1,
				'hari' => 'senin',
				'jam_mulai' => '01:01:01',
				'jam_selesai' => '02:02:02'
			)
		);
		
		//insert review
		DB::table('review')->insert(
			array(
				'id_pasien' => 1,
				'id_fasilitas' => 1,
				'rating' => 1,
				'review' => 'review dari pasien1'
			)
		);
		DB::table('review')->insert(
			array(
				'id_pasien' => 2,
				'id_fasilitas' => 1,
				'rating' => 2,
				'review' => 'review dari pasien2'
			)
		);
		DB::table('review')->insert(
			array(
				'id_pasien' => 3,
				'id_fasilitas' => 1,
				'rating' => 3,
				'review' => 'review dari pasien3'
			)
		);
		
		//insert taxi
		DB::table('taxi')->insert(
			array(
				'nama' => 'nama taxi1',
				'telepon' => 'telepon taxi1'
			)
		);
		DB::table('taxi')->insert(
			array(
				'nama' => 'nama taxi2',
				'telepon' => 'telepon taxi2'
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
		
		Schema::table('auth', function (Blueprint $table) {
            $table->drop();
        });
	}

}