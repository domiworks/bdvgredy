<?php

use Carbon\Carbon;

class ViewDokterController extends BaseController {
	
	public function view_index(){
		$list_pasien = Tunggu_Pasien::where('id_dokter','=',1)->get();
		return View::make('pages.admin.dashboard',compact('list_pasien'));
	}
	
	public function view_detail_pasien($id_pasien){
		$data_pasien = $this->view_data_pasien($id_pasien);
		$alergi = $this->get_alergi($id_pasien);
		$rekam_medis = $this->get_rekam($id_pasien);
		return View::make('pages.admin.detail_pasien',compact('data_pasien','alergi','rekam_medis'));
	}
	
	public function view_third_page(){
		return View::make('pages.login');
	}
	
	
	public function view_data_pasien($id_pasien){
		$pasien = Pasien::find($id_pasien);
		if(count($pasien)==1){
			return $pasien;
		}
		else{
			return NULL;
		}
		
	}
	
	public function get_alergi($id_pasien){
		$list_alergi = Alergi::where('id_pasien','=',$id_pasien)->get();
		
		if(count($list_alergi)==0){
			return NULL;
		}
		else{
			return $list_alergi;
		}
	}
	
	public function get_rekam($id_pasien){
		$rekams = Rekam_Medis::where('id_pasien','=',$id_pasien)->get();
		if(count($rekams) == 0){
			return NULL;
		}
		else{
			return $rekams;
		}
	}
	
	
	
}

?>