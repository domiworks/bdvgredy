<?php

use Carbon\Carbon;

class CategoryAdminController extends BaseController {
	
	public $restful = true;
	public $timestamp = false;
	
	public function view_category()
	{
		$categories = $this->get_category();
		return View::make('pages.admin.category.category',compact('categories'));
	}
	
	public function view_add_category()
	{
		return View::make('pages.admin.category.add_new_category');
	}
	
	public function view_edit_category($id)
	{
		$category =  Category::find($id);
		return View::make('pages.admin.category.edit_category',compact('category'));
	}
	
	public function add_category()
	{
		$name = Input::get('cat_title');
		$gender = Input::get('gender');
		if(Input::hasFile('desktop_thumbnail')){
			$photo1 = Input::file('desktop_thumbnail');
		}
		else{
			$photo1 = false;
		}
		
		if(Input::hasFile('phone_thumbnail')){
			$photo2 = Input::file('phone_thumbnail');
		}
		else{
			$photo2 = false;
		}
		
		if($gender==0){
			$destination = 'assets/file_upload/category/'.$name.'/man';
		}
		elseif($gender==1){
			$destination = 'assets/file_upload/category/'.$name.'/woman';
		}
		else{
			$destination = 'assets/file_upload/category/'.$name.'/unisex';
		}
		
		$result = $this->add_new_category($name ,$photo1,$photo2,$gender,$destination);
		if($result){
			return Redirect::to('admingate')->with('add_category_message', 'Success');
		}
		else{
			return Redirect::to('admingate')->with('add_category_message', 'Failed');
		}
	}
	
	public function edit_category(){
		$id = Input::get('id_category');
		$name = Input::get('cat_title');
		$gender = Input::get('gender');
		$photo1=false;
		$photo2=false;
		if(Input::hasFile('desktop_thumbnail')){
			$photo1 = Input::file('desktop_thumbnail');
		}
		if(Input::hasFile('phone_thumbnail')){
			$photo2 = Input::file('phone_thumbnail');
		}
		$result = $this->edit_one_category($id,$name,$gender,$photo1,$photo2);
		if($result){
			return Redirect::to('admingate')->with('edit_category_message', 'Success');
		}
		else{
			return Redirect::to('admingate')->with('edit_category_message', 'Success');
		}
	}
	
	public function edit_one_category($id,$name,$gender,$photo1,$photo2){
		$category = Category::find($id);
		$old_name = $category->name;
		$old_gender = $category->gender;

		$destination = 'assets/file_upload/category/';
		
		$old_destination = $destination.$old_name;
		
		$new_destination = $destination;
		
		if($category->gender==0){
			$old_destination .= '/man';
		}
		elseif($category->gender==1){
			$old_destination .= '/woman';
		}
		else{
			$old_destination .= '/unisex';
		}
		//name
		if(strcmp($old_name,$name) != 0){
			$category->name = $name;
		}
		$new_destination.=$name;
		
		//gender
		if($old_gender != $gender){
			$category->gender = $gender;
		}
		
		if($gender==0){
			$new_destination .= '/man';
		}
		elseif($category->gender==1){
			$new_destination .= '/woman';
		}
		else{
			$new_destination .= '/unisex';
		}
		
		if($photo1 != false){
			$old_photo1 = $category->desktop_thumbnail;
			File::delete($old_photo1);
			$category->desktop_thumbnail = $new_destination.'/'.$photo1->getClientOriginalName();
			$photo1->move($old_destination, $photo1->getClientOriginalName());
		}
		else{
			$arr = explode('/', $category->desktop_thumbnail);
			$category->desktop_thumbnail = $new_destination.'/'.$arr[5];
		}
		
		if($photo2 !=false){
			$old_photo2 = $category->phone_thumbnail;
			File::delete($old_photo2);
			$category->phone_thumbnail = $new_destination.'/'.$photo2->getClientOriginalName();
			$photo2->move($old_destination, $photo2->getClientOriginalName());
		}
		else{
			$arr = explode('/', $category->phone_thumbnail);
			$category->phone_thumbnail = $new_destination.'/'.$arr[5];
		}
		
		$category -> save();
		if(strcmp($old_name,$name)==1 || $old_gender!=$category->gender){
			File::copyDirectory($old_destination, $new_destination);
			File::deleteDirectory($old_destination);
		}
		
		return true;
		
	}
	
	public function delete_category(){
		$id = Input::get('id_category');
		$result = $this->delete_one_category($id);
		if($result){
			return "Success";
		}
		else{
			return "Failed";
		}
	}

	public function add_new_category($name,$photo1,$photo2,$gender,$destination){
		$category = new Category();
		$category -> name = $name;
		$category -> gender = $gender;
		if($photo1 == false){
			$category -> desktop_thumbnail = "";
		}
		else{
			$category -> desktop_thumbnail = $destination.'/'.$photo1->getClientOriginalName();
		}
		if($photo2 == false){
			$category -> phone_thumbnail = "";
		}
		else{
			$category -> phone_thumbnail = $destination.'/'.$photo2->getClientOriginalName();
		}
		try{
			$category -> save();
			if($photo1!=false){
				$photo1->move($destination, $photo1->getClientOriginalName());
			}
			if($photo2!=false){
				$photo2->move($destination, $photo2->getClientOriginalName());
			}
			return true;
		}
		catch(Exception $e){
			return false;
		}
	}
	
	public function delete_one_category($id_category){
		$category = Category::find($id_category);
		
		if($category->gender==0){
			$destination = 'assets/file_upload/category/'.$category->name.'/man';
		}
		elseif($category->gender==1){
			$destination = 'assets/file_upload/category/'.$category->name.'/woman';
		}
		else{
			$destination = 'assets/file_upload/category/'.$category->name.'/unisex';
		}
		
		File::deleteDirectory($destination);
		
		if(count($category)==1){
			$category->delete();
			return true;
		}
		else{
			return false;
		}
		
	}

	public function get_category(){
		$categories = Category::all();
		if(count($categories) != 0)
		{
			return $categories;
		}else
		{
			return NULL;
		}
	}
}
?>