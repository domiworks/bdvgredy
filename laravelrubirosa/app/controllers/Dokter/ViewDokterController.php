<?php

use Carbon\Carbon;

class ViewDokterController extends BaseController {
	
	public function view_index(){
		return View::make('pages.login');
	}
	
	public function view_second_page(){
		return View::make('pages.login');
	}
	
	public function view_third_page(){
		return View::make('pages.login');
	}
	
	
	
	
	
}

?>