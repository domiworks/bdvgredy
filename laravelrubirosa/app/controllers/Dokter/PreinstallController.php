<?php

use Carbon\Carbon;

class PreinstallController extends BaseController {

	public function install(){
		$this->instalTipeFaskes();
		$this->instalTipeKantorBPJS();
		$this->instalJaskes();
		$this->instalKantorBPJS();
		
	}
	
	public function instalTipeFaskes(){
		$file_handle = fopen("assets/file_csv/BPJS/BPJS.faskes.type.csv","r");
		while (!feof($file_handle) ) {
			try{
				$line_of_text = fgetcsv($file_handle, 1024);	
				$tipe_faskes = new Tipe_Jaskes();
				$tipe_faskes->tipe = $line_of_text[0];
				$tipe_faskes->kode = $line_of_text[1];
				$tipe_faskes->jenis = $line_of_text[2];
				$tipe_faskes->save();
			}
			catch(Exception $e){
				
			}
		}

		fclose($file_handle);
		
		return "Finish";
	}
	
	public function instalTipeKantorBPJS(){
		for($i=0;$i<3;$i++){
			$tipe_kantor = new Tipe_Kantor_BPJS();
			if($i==0){
				$tipe_kantor->tipe = "Pusat";
			}
			elseif($i==1){
				$tipe_kantor->tipe = "Divre";
			}
			elseif($i==2){
				$tipe_kantor->tipe = "Branch";
			}
			$tipe_kantor->save();
		}
	}
	
	public function instalJaskes(){
		$file_handle = fopen("assets/file_csv/BPJS/BPJS.faskes.branch.bandung.geolocated.csv","r");
		while (!feof($file_handle) ) {
			try{
				$line_of_text = fgetcsv($file_handle, 1024);	
				$jaskes = new Jaskes();
				$jaskes->tipe = Tipe_Jaskes::where('kode','=',$line_of_text[3])->get()[0]->id;
				$jaskes->nama=$line_of_text[4];
				$jaskes->alamat=$line_of_text[5];
				$jaskes->kabupaten=$line_of_text[2];
				$jaskes->kecamatan=$line_of_text[8];
				$jaskes->kota=$line_of_text[1];
				$jaskes->telepon=$line_of_text[6];
				$jaskes->divre=5;
				$jaskes->kelas=$line_of_text[7];
				$jaskes->long=$line_of_text[10];
				$jaskes->lat=$line_of_text[9];
				$jaskes->save();
			}
			catch(Exception $e){
			
			}
		}

		fclose($file_handle);
		
		return "Finish";
	}
	
	public function instalKantorBPJS(){
		$file_handle = fopen("assets/file_csv/BPJS/BPJS.office.divre.all.csv","r");
		while (!feof($file_handle) ) {
			try{
				$line_of_text = fgetcsv($file_handle, 1024);	
				$kantor = new Kantor_BPJS();
				$kantor->tipe =Tipe_Kantor_BPJS::where('tipe','=',$line_of_text[0])->get()[0]->id;
				if(strcmp($line_of_text[1],'I')==0){
					$kantor->cabang =1;
				}
				elseif(strcmp($line_of_text[1],'II')==0){
					$kantor->cabang =2;
				}
				elseif(strcmp($line_of_text[1],'III')==0){
					$kantor->cabang =3;
				}
				elseif(strcmp($line_of_text[1],'IV')==0){
					$kantor->cabang =4;
				}
				elseif(strcmp($line_of_text[1],'V')==0){
					$kantor->cabang =5;
				}
				elseif(strcmp($line_of_text[1],'VI')==0){
					$kantor->cabang =6;
				}
				elseif(strcmp($line_of_text[1],'VII')==0){
					$kantor->cabang =7;
				}
				elseif(strcmp($line_of_text[1],'VIII')==0){
					$kantor->cabang =8;
				}
				elseif(strcmp($line_of_text[1],'IX')==0){
					$kantor->cabang =9;
				}
				elseif(strcmp($line_of_text[1],'X')==0){
					$kantor->cabang =10;
				}
				elseif(strcmp($line_of_text[1],'XI')==0){
					$kantor->cabang =11;
				}
				elseif(strcmp($line_of_text[1],'XII')==0){
					$kantor->cabang =12;
				}
				elseif(strcmp($line_of_text[1],'XIII')==0){
					$kantor->cabang =13;
				}
				elseif(strcmp($line_of_text[1],'XIV')==0){
					$kantor->cabang =14;
				}
				elseif(strcmp($line_of_text[1],'XV')==0){
					$kantor->cabang =15;
				}
				else{
					$kantor->cabang = $line_of_text[1];
				}
				$kantor->alamat =$line_of_text[2];
				$kantor->kota =$line_of_text[3];
				$kantor->zip =$line_of_text[4];
				$kantor->telepon =$line_of_text[5];
				$kantor->fax =$line_of_text[6];
				$kantor->hotline =$line_of_text[7];
				$kantor->long =0;
				$kantor->lat =0;
				
				$kantor->save();
			}
			catch(Exception $e){
				
			}
		}

		fclose($file_handle);
		
		return "Finish";
	}
	
	
	
	
	
	
	
	
}

?>