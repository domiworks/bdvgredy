<?php

use Carbon\Carbon;

class ViewDokterController extends BaseController {
	
	public function view_index(){
		$list_pasien = Tunggu_Pasien::where('id_dokter','=',1)->get();
		return View::make('pages.admin.dashboard',compact('list_pasien'));
	}
	
	public function view_second_page(){
		return View::make('pages.login');
	}
	
	public function view_third_page(){
		return View::make('pages.login');
	}
	
	
	
	
	
}

?>