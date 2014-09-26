<?php

use Carbon\Carbon;

class ArticleAdminController extends BaseController {
	
	public $restful = true;
	public $timestamp = false;
	
	/*
	
		Cleaning Tips
	
	*/
	
	public function view_cleaning_tips(){
		$cleaning = $this->get_cleaning_tips();
		return View::make('pages.admin.cleaningtips.cleaningtips',compact('cleaning'));
	}
	
	public function get_cleaning_tips(){
		$cleaning = Article::find(1);
		if(count($cleaning)==1){
			return $cleaning;
		}
		else{
			return NULL;
		}
	}
	
	public function edit_cleaning_tips(){
		$content = Input::get('edit_content');
		$result = $this->edit_a_cleaning_tips($content);
		if($result){
			return Redirect::to('admingate')->with('edit_cleaning_message', 'Success');
		}
		else{
			return Redirect::to('admingate')->with('edit_cleaning_message', 'Failed');
		}
	}
	
	public function edit_a_cleaning_tips($content,$id=1){
		$cleaning = Article::find($id);
		$cleaning->content = $content;
		$cleaning->created_time = Carbon::now();
		try{
			$cleaning->save();
			return true;
		}
		catch(Exception $e){
			return false;
		}
	}
	
	/*
	
		Blog
	
	*/
	
	public function view_blog()
	{
		$blogs=$this->get_blog_list();
		return View::make('pages.admin.blog.blog',compact('blogs'));
	}
	
	
	public function view_add_blog()
	{
		return View::make('pages.admin.blog.add_new_blog');
	}
	
	public function view_edit_blog($id){
		$blog = Article::find($id);
		return View::make('pages.admin.blog.edit_blog',compact('blog'));
	}
	
	public function edit_blog(){
		$id = Input::get('id_edit');
		$title = Input::get('blog_title');
		$content = Input::get('blog_content');
		if(Input::hasFile('blog_cover_img')){
			$photo = Input::file('blog_cover_img');
		}
		else{
			$photo = false;
		}
		
		
		$destination = 'assets/file_upload/blog/';
		$result = $this->edit_one_blog($id,$title,$content,$photo,$destination);
		if($result){
			return Redirect::to('admingate')->with('edit_blog_message', 'Success');
		}
		else{
			return Redirect::to('admingate')->with('edit_blog_message', 'Failed');
		}
	}
	
	public function edit_one_blog($id,$title,$content,$photo,$destination){
		$blog = Article::find($id);
		$blog->title = $title;
		$blog->content = $content;
		$now   = new DateTime();
		$destination.=$title;
		$destination.=$now->format('d-m-Y-H-i').'/';
	
		$blog->created_time = Carbon::now();
		if($blog->photo != NULL){
			$arr = explode('/',$blog->photo);
			$old_destination = $arr[0].'/'.$arr[1].'/'.$arr[2].'/'.$arr[3];
		}
		else{
			$old_destination = "";
		}
		
		if($photo !=false){	
			$photo->move($destination, $photo->getClientOriginalName());
			$blog->photo = $destination.$photo->getClientOriginalName();
		}
		else{
			File::makeDirectory($destination);
			File::move($blog->photo,$destination.$arr[4]);
			$blog->photo = $destination.$arr[4];
		}
		File::deleteDirectory($old_destination);	
		try{
			$blog->save();
			return true;
		}
		catch(Exception $e){
			return false;
		}
	}
	
	public function get_blog_list(){
		return Article::where('id', '!=', '1')->get();
	}
	
	
	
	public function add_blog(){
		$title = Input::get('blog_title');
		$content = Input::get('content_area');
		$photo = false;
		$now   = new DateTime();
		if(Input::hasFile('blog_cover_img')){
			$photo = Input::file('blog_cover_img');
		}
		$destination = 'assets/file_upload/blog/'.$title;
		$destination.=$now->format('d-m-Y-H-i') .'/';
		$result = $this->add_one_blog($title,$content,$photo,$destination);
		if($result){
			return Redirect::to('admingate')->with('add_blog_message', 'Success');
		}
		else{
			return Redirect::to('admingate')->with('add_blog_message', 'Failed');
		}
	}
	
	public function add_one_blog($title,$content,$photo,$destination){
		
		$article = new Article();
		$article->title = $title;
		$article->content = $content;
		$article->created_time = Carbon::now();
		
		if($photo!=false){
			$article->photo = $destination.$photo->getClientOriginalName();
			$photo->move($destination, $photo->getClientOriginalName());
		}
		try{
			$article->save();
			return true;
		}
		catch(Exception $e){
			return false;
		}
		
	}
	
	public function delete_blog(){
		$id = Input::get('id_blog');
		$result = $this->delete_one_blog($id);
		if($result){
			return "Deleted";
		}
		else{
			return "Error";
		}
	}
	
	public function delete_one_blog($id){
		$blog = Article::find($id);
		if($blog->photo!=NULL){
			$arr = explode('/', $blog->photo);
			$destination = $arr[0].'/'.$arr[1].'/'.$arr[2].'/'.$arr[3];
			try{
				File::deleteDirectory($destination);
				$blog->delete();
				return true;
			}
			catch(Exception $e){
				return false;
			}
		}
		else{
			try{
				$blog->delete();
				return true;
			}
			catch(Exception $e){
				return false;
			}
		}
		
		
	}
	
}
?>