<?php

use Carbon\Carbon;

class ProductController extends BaseController {
	
	public $restful = true;
	public $timestamp = false;
	
	public function view_list_product_of_category($category){
		$products = Product::where('id_category','=',$category)->get();
		if(count($products)==0){
			return NULL;
		}
		return View::make('pages.front.product.product',compact('products'));
	}
	
	public function view_mobile_product($id){
		$products = $this->get_product($id);
		$galleries = $this->get_gallery($id);
		return View::make('pages.front.product.product_view_mob',compact('products','galleries'));
	}
	
	public function get_product($id){
		/*$product = Product::find($id);
		$category = Category::find($product->id_category)->name;
		$gallery = Gallery::where('id_product','=',$id)->get();
		return array('product' => $product,'category'=>$category,'gallery'=>$gallery);*/
		
		$product = DB::table('product')->join('category','product.id_category', '=', 'category.id')->where('product.id','=',$id)->select('product.id as id_product','product.name as name_product','product.price as price_product','product.description as desc_product','product.hex1 as hex1_product','product.hex2 as hex2_product','product.hex3 as hex3_product','product.photo as photo_product','category.name as name_category')->get();
		return $product;
	}
	
	public function get_gallery($id){
		$gallery = Gallery::where('id_product','=',$id)->get();
		return $gallery;
	}
}
?>