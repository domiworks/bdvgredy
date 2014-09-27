<?php

use Carbon\Carbon;

class PreinstallController extends BaseController {

	public function install(){
		$this->instalTipeFaskes();
		$this->instalTipeKantorBPJS();
		$this->instalJaskes();
		$this->instalKantorBPJS();
		
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
				'spesialisasi' => 'spesialisasi dokter1'
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
				'id_pasien' => 1,
				'diagnosis' => 'diagnosis pasien1 oleh dokter1'
			)
		);
		DB::table('rekam_medis')->insert(
			array(
				'tanggal' => '2014-09-15',
				'id_dokter' => 1,
				'id_pasien' => 2,
				'diagnosis' => 'diagnosis pasien2 oleh dokter1'
			)
		);
		DB::table('rekam_medis')->insert(
			array(
				'tanggal' => '2014-09-15',
				'id_dokter' => 1,
				'id_pasien' => 3,
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
	
		
		return "Finish";
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
				return $e;
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