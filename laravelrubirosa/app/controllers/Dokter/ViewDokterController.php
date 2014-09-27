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
		if(count($alergi)==0){
			$alergi = null;
		}
		
		
		$rekam_medis = $this->get_rekam($id_pasien);
		if(count($rekam_medis)==0){
			$rekam_medis=null;
		}
		return View::make('pages.admin.detail_pasien',compact('data_pasien','alergi','rekam_medis'));
	}
	
	public function view_form_pemeriksaan(){
		return View::make('pages.admin.form_pemeriksaan');
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
	
	public function set_rekam_medis(){
		$id_pasien = 1;
		$id_dokter = 1;
		$alergies= Input::get('alergi');
		$diagnosa = Input::get('diagnosa');
		$obats = Input::get('obat');
		foreach($alergies as $alergi){
			if($alergi!=""){
				$alg = new Alergi();
				$alg->id_pasien = $id_pasien;
				$alg->alergi = $alergi;
				$alg->save();
			}
		}
		if($diagnosa!=""){
			$rekam = new Rekam_Medis();
			$rekam -> tanggal = Carbon::now();
			$rekam ->id_dokter = $id_dokter;
			$rekam ->id_pasien = $id_pasien;
			$rekam ->diagnosis = $diagnosa;
			$rekam ->save();
		}
		
		foreach($obats as $obat){
			if($obat!=""){
				$obt = new Daftar_Obat();
				$obt->id_kunjungan = $rekam->id;
				$obt->nama = $obat;
				$obt->save();
			}
		}
		
		return Redirect::to('admingate');
	}
	
	
	
}

?>