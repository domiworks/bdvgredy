<?php

use Carbon\Carbon;

class IndexController extends BaseController {
	
	public $restful = true;
	public $timestamp = false;
	
	public function view_index(){
		$blogs = Article::where('id','!=','1')->orderBy('created_time','desc')->get();
		if(count($blogs)!=0){
			$blog = $blogs[0];
		}
		else{
			$blog = NULL;
		}
		return View::make('pages.front.index.index',compact('blog'));
	}
}
?>