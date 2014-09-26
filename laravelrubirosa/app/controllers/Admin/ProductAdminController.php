<?php

use Carbon\Carbon;

class ProductAdminController extends BaseController {
	
	public $restful = true;
	public $timestamp = false;
	
	public function view_product(){
		$products = $this->get_list_product();
		return View::make('pages.admin.product.product',compact('products'));
	}
	
	public function get_list_product(){
		$product = Product::all();
		if(count($product)!=0){
			return $product;
		}
		else{
			return null;
		}
	}
	
	public function view_edit_product($id){
		$product = Product::find($id);
		$categories = $this->get_category();
		$gallery = Gallery::where('id_product','=',$id)->get();
		return View::make('pages.admin.product.edit_product',compact('product','categories','gallery'));
	}
	
	public function edit_product(){
		$id = Input::get('id_product');
		$category = Input::get('category');
		$name = Input::get('product_title');
		$price = Input::get('product_price');
		$description = Input::get('product_desc');
		$hex1 = Input::get('hex_1');
		$hex2 = Input::get('hex_2');
		$hex3 = Input::get('hex_3');
		$slide=array();
		$count=0;
		if(Input::hasFile('product_thumbnail')){
			$photo = Input::file('product_thumbnail');
		}
		else{
			$photo = false;
		}
		
		if(Input::hasFile('slide_1')){
			$slide[$count] = Input::file('slide_1');
		}
		else{
			$slide[$count] = false;
		}
		$count++;

		if(Input::hasFile('slide_2')){
			$slide[$count] = Input::file('slide_2');
		}
		else{
			$slide[$count] = false;
		}
		$count++;
		if(Input::hasFile('slide_3')){
			$slide[$count] = Input::file('slide_3');
		}
		else{
			$slide[$count]= false;
		}
		$count++;
		if(Input::hasFile('slide_4')){
			$slide[$count] = Input::file('slide_4');
		}
		else{
			$slide[$count] = false;
		}
		$count++;
		if(Input::hasFile('slide_5')){
			$slide[$count] = Input::file('slide_5');
		}
		else{
			$slide[$count] = false;
		}
		
		$result = $this->edit_one_product($id,$category,$name,$price,$description,$hex1,$hex2,$hex3,$photo,$slide);
		if($result){
			return Redirect::to('admingate')->with('edit_product_message', 'Success');
		}
		else{
			return Redirect::to('admingate')->with('edit_product_message', 'Success');
		}
	}
	
	public function edit_one_product($id,$category,$name,$price,$description,$hex1,$hex2,$hex3,$photo,$slide){
		$product = Product::find($id);
		$gallery = Gallery::where('id_product','=',$id)->get();
		
		$product->name = $name;
		$product->price = $price;
		$product->description = $description;
		$product->hex1 = $hex1;
		$product->hex2 = $hex2;
		$product->hex3 = $hex3;
		$now = new DateTime();
		$arr = explode('/',$product->photo);
		$old_destination=$arr[0].'/'.$arr[1].'/'.$arr[2].'/'.$arr[3].'/';
		$old_destination_gallery=$arr[0].'/'.$arr[1].'/'.$arr[2].'/'.$arr[3].'/gallery/';
		$destination = $arr[0].'/'.$arr[1].'/'.$arr[2].'/'.$name.$now->format('d-m-Y-H-i').'/';
		$destination_gallery = $arr[0].'/'.$arr[1].'/'.$arr[2].'/'.$name.$now->format('d-m-Y-H-i').'/gallery/';
		if($photo!=false){
			File::delete($product->photo);
			$product->photo = $destination.$photo->getClientOriginalName();
			$photo->move($old_destination, $photo->getClientOriginalName());
		}
		else{
			$product->photo = $destination.$arr[4];
		}
		$count =0;
		$length = count($gallery);
		foreach($slide as $value){
			if($count < $length){
				if($value!=false){
					$gallery[$count]->id_product = $id;
					File::delete($gallery[$count]->photo);
					$gallery[$count]->photo = $destination_gallery.$value->getClientOriginalName();
					$value->move($old_destination_gallery, $value->getClientOriginalName());
					$gallery[$count]->save();
				}
				else{
					$temp_arr = explode('/',$gallery[$count]->photo);
					$gallery[$count]->photo = $destination_gallery.$temp_arr[count($temp_arr)-1];
					$gallery[$count]->save();
				}
			}
			else{
				if($value!=false){
					$new_gallery = new Gallery();
					$new_gallery->id_product = $id;
					$new_gallery->photo = $destination_gallery.$value->getClientOriginalName();
					$value->move($old_destination_gallery, $value->getClientOriginalName());
					$new_gallery->save();
				}
			}
			$count++;
		}
		
		try{
			$product->save();
			File::copyDirectory($old_destination,$destination);
			if(strcmp($old_destination,$destination)!=0){
				File::deleteDirectory($old_destination);
			}	
			return true;
		}
		catch(Exception $e){
			return false;
		}
	}
	
	
	
	public function view_add_product(){
		$categories = $this->get_category();
		return View::make('pages.admin.product.add_new_product',compact('categories'));
	}
	
	
	
	public function add_new_product(){
		$category = Input::get('category');
		$name = Input::get('product_title');
		$price = Input::get('product_price');
		$description = Input::get('product_desc');
		$hex1 = Input::get('hex_1');
		$hex2 = Input::get('hex_2');
		$hex3 = Input::get('hex_3');
		$slide=array();
		$count=0;
		if(Input::hasFile('product_thumbnail')){
			$photo = Input::file('product_thumbnail');
		}
		else{
			$photo = false;
		}
		
		if(Input::hasFile('slide_1')){
			$slide[$count] = Input::file('slide_1');
		}
		else{
			$slide[$count] = false;
		}
		$count++;

		if(Input::hasFile('slide_2')){
			$slide[$count] = Input::file('slide_2');
		}
		else{
			$slide[$count] = false;
		}
		$count++;
		if(Input::hasFile('slide_3')){
			$slide[$count] = Input::file('slide_3');
		}
		else{
			$slide[$count]= false;
		}
		$count++;
		if(Input::hasFile('slide_4')){
			$slide[$count] = Input::file('slide_4');
		}
		else{
			$slide[$count] = false;
		}
		$count++;
		if(Input::hasFile('slide_5')){
			$slide[$count] = Input::file('slide_5');
		}
		else{
			$slide[$count] = false;
		}
		
		$result = $this->add_one_new_product($category,$name,$price,$description,$hex1,$hex2,$hex3,$photo,$slide);
		if($result){
			return Redirect::to('admingate')->with('add_product_message', 'Success');
		}
		else{
			return Redirect::to('admingate')->with('add_product_message', 'Failed');
		}
	}
	
	public function delete_product(){
		$id = Input::get('id_product');
		$result = $this->delete_one_product($id);
		return "Berhasil";
	}
	
	public function delete_one_product($id){
		$product = Product::find($id);
		$arr = explode('/',$product->photo);
		$folder = $arr[0].'/'.$arr[1].'/'.$arr[2].'/'.$arr[3];
		Gallery::where('id_product','=',$id)->delete();
		File::deleteDirectory($folder);
		$product->delete();
		return true;
		
	}
	
	public function add_one_new_product($category,$name,$price,$description,$hex1,$hex2,$hex3,$photo,$slide){
		$product = new Product();
		
		$now = new DateTime();
		$destination = 'assets/file_upload/product/'.$name.$now->format('d-m-Y-H-i').'/';
		$destination_gallery = 'assets/file_upload/product/'.$name.$now->format('d-m-Y-H-i').'/gallery/';
		$product->name= $name;
		$product->id_category = $category;
		$product->price = $price;
		$product->description = $description;
		$product->hex1 = $hex1;
		$product->hex2 = $hex2;
		$product->hex3 = $hex3;
		if($photo!=null){
			$product->photo = $destination.$photo->getClientOriginalName();
			$photo->move($destination, $photo->getClientOriginalName());
		}
		try{
			$product->save();
		}
		catch(Exception $e){
			return false;
		}
		$products = Product::where('photo','=',$destination.$photo->getClientOriginalName())->get();
		if(count($products)==1){
			$id = $products[0]->id;
			foreach($slide as $value){
				if($value!=false){
					$gallery = new Gallery();
					$gallery->id_product = $id;
					$gallery->photo = $destination_gallery.$value->getClientOriginalName();
					$value->move($destination_gallery, $value->getClientOriginalName());
					$gallery->save();
				}
			}
			return true;
		}
		else{
			return false;
		}
		
		
	}
	
	public function get_category(){
		$category =  DB::table('category')->orderBy('name','asc')->orderBy('gender','asc')->get();
		$arr = array();
		foreach($category as $value){
			if($value->gender == 0){
				$arr[$value->id] = $value->name." > Man";
			}
			elseif($value->gender == 1){
				$arr[$value->id] = $value->name." > Woman";
			}
			else{
				$arr[$value->id] = $value->name." > Unisex";
			}
		}
		return $arr;
	}
}
?>