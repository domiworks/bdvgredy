<?php

use Carbon\Carbon;

class ArticleController extends BaseController {
	
	public $restful = true;
	public $timestamp = false;
	
	public function view_cleaning_tips(){
		$cleaning = Article::find(1);
		return View::make('pages.front.cleaning_tips.cleaning_tips',compact('cleaning'));
	}
	
	public function view_blog_list(){
		$blogs = $this->get_list_blog();
		return View::make('pages.front.blog.blog',compact('blogs'));
	}
	
	public function get_list_blog(){
		$blogs = Article::where('id','!=','1')->orderBy('created_time','desc')->get();
		return $blogs;
	}
	
	public function get_one_blog($id){
		$blog = Article::find($id);
		return $blog;
	}
}
?>