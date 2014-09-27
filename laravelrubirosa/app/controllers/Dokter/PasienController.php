<?php

use Carbon\Carbon;

class PasienController extends BaseController {
	
	
	function get_all_jaskes(){
		$jaskeses = Jaskes::all();
		return $jaskeses;
	}
	
	function get_satu_jaskes($id_jaskes){
		$jaskes = Jaskes::find($id_jaskes);
		return $jaskes;
	}
	
	
	function get_all_kantor(){
		$kantors = Kantor_BPJS::all();
		return $kantors;
	}
	
	function get_satu_kantor($id_kantor){
		$kantor = Kantor_BPJS::find($id_kantor);
		return $kantor;
	}
	
	function get_ugd_terdekat($long,$lat){

		$ugds = Jaskes::where('ugd','=',1)->get();
		
		$minimum = INF;
		$minimum_ugd = "";
		foreach($ugds as $ugd){
			$lng = ($ugd->long - $long) * ($ugd->long - $long);
			$ltd = ($ugd->lat - $lat) * ($ugd->lat - $lat);
			$distance = sqrt($lng + $ltd);
			if($distance < $minimum){
				$minimum = $distance;
				$minimum_ugd = $ugd;
			}
		}
		
		return $minimum_ugd;
	}
	
	function get_all_review($id_fasilitas){
		$reviews = Review::where('id_fasilitas','=',$id_fasilitas)->get();
		if(count($reviews)==1){
			return $reviews;
		}
		return "Tidak ada Review";
	}
	
	function get_all_rekam_medis($id_pasien){
		$rekams = Rekam_Medis::where('id_pasien','=',$id_pasien)->get();
		if(count($rekams) == 0){
			return "Kosong";
		}
		else{
			return $rekams;
		}
	}
	

	
	
	
}

?>