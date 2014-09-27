<?php

use Carbon\Carbon;

class JadwalDokterController extends BaseController {
	
	public function get_daftar_pasien_satu_hari(){
		
	}
	
	public function get_data_pasien(){
	
	}
	
	public function tulis_rekap_medis(){
	
	}
	
	function get_all_dokter_di_jakes($id_fasilitas){
		$dokters = Jadwal_Jaga::where('id_fasilitas','=',$id_fasilitas)->get();
		if(count($dokters) == 0){
			return "Kosong";
		}
		else{
			return $dokters;
		}
	}
	
	function get_antrian($id_dokter){
		
		$list_pasien = DB::table('tunggu_pasien')->join('pasien', 'tunggu_pasien.id_pasien', '=', 'pasien.id') 
		-> join('dokter','tunggu_pasien.id_dokter', '=', 'dokter.id')
		-> where('tunggu_pasien.id_dokter','=',$id_dokter)
		->select('tunggu_pasien.id as id','pasien.nama as nama_pasien','dokter.nama as nama_dokter')
		->get();
		if(count($list_pasien)==0){
			return "Kosong";
		}
		else{
			return $list_pasien;
		}
	}
	
	
	
	
	
}

?>