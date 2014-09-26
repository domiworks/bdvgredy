<?php

use Carbon\Carbon;

class CategoryController extends BaseController {
	
	public $restful = true;
	public $timestamp = false;
	
	public function view_main_category(){
		return View::make('pages.front.main_category.main_category');
	}
	
	public function view_category($gender){
		$gender_code = -1;
		if(strcmp($gender,"man")==0){
			$gender_code = 0;
		}
		elseif(strcmp($gender,"woman")==0){
			$gender_code = 1;
		}
		else{
			$gender_code = 2;
		}
		$categories = Category::where('gender','=',$gender_code)->get();
		return View::make('pages.front.category.category',compact('categories','gender_code'));
	}
}
?>