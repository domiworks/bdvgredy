<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/login', function()
{
	return View::make('pages.login');
});

//bagian depan website yang dilihat oleh tamu
Route::group(['prefix' => ''], function()
{
	// index
	Route::get('/', ['as' => '', 'uses' => 'IndexController@view_index']);
	Route::get('/index', ['as' => 'index', 'uses' => 'IndexController@view_index']);
	

	// daftar gener
	
	Route::get('/main_category', ['as' => 'main_category', 'uses' => 'CategoryController@view_main_category']);
	
	// daftar kategori
	
	Route::get('/category/{gender}', ['as' => 'category.{gender}', 'uses' => 'CategoryController@view_category']);
	
	//daftar produk
	
	Route::get('/product/{category}', ['as' => 'product.{category}', 'uses' => 'ProductController@view_list_product_of_category']);
	
	Route::get('/get_product/{id}', ['as' => 'get_product.{id}', 'uses' => 'ProductController@get_product']);
	Route::get('/get_gallery/{id}', ['as' => 'get_gallery.{id}', 'uses' => 'ProductController@get_gallery']);
	

	// detail produk khusus via phone

	
	Route::get('/view_mob/{id}', ['as' => 'view_mob.{id}', 'uses' => 'ProductController@view_mobile_product']);
	
	// cleaning tips
	
	Route::get('/cleaning_tips', ['as' => 'cleaning_tips', 'uses' => 'ArticleController@view_cleaning_tips']);
	
	// blog
	
	Route::get('/blog', ['as' => 'blog', 'uses' => 'ArticleController@view_blog_list']);
	Route::get('/one_blog/{id}', ['as' => 'one_blog.{id}', 'uses' => 'ArticleController@get_one_blog']);

});

//admin panel route sementara
Route::group(['prefix' => 'admingate'], function()
{

	//welcome
	Route::get('/', function()
	{
		return View::make('pages.admin.dashboard');
	});

    /*
		category
	*/
	//get
	Route::get('/category', ['as' => 'admingate.category', 'uses' => 'CategoryAdminController@view_category']);
	Route::get('/add_new_category', ['as' => 'admingate.add_new_category', 'uses' => 'CategoryAdminController@view_add_category']);
	Route::get('/listcategory', ['as' => 'admingate.listcategory', 'uses' => 'CategoryAdminController@get_category']);
	Route::get('/view_edit_category/{id}', ['as' => 'admingate.view_edit_category.{id}', 'uses' => 'CategoryAdminController@view_edit_category']);
	
	
	
	//post
	
	Route::post('/add_category', ['as' => 'admingate.add_category', 'uses' => 'CategoryAdminController@add_category']);
	
	//put
	Route::put('/edit_category', ['as' => 'admingate.edit_category', 'uses' => 'CategoryAdminController@edit_category']);
	
	
	//delete
	Route::delete('/delete_category', ['as' => 'admingate.delete_category', 'uses' => 'CategoryAdminController@delete_category']);
	
	
	/*
		end of category
	*/
	

    /*
		product
	*/
	Route::get('/product', ['as' => 'admingate.product', 'uses' => 'ProductAdminController@view_product']);
	Route::get('/list_product', ['as' => 'admingate.list_product', 'uses' => 'ProductAdminController@get_list_product']);
	Route::get('/add_new_product', ['as' => 'admingate.add_new_product', 'uses' => 'ProductAdminController@view_add_product']);
	Route::get('/view_edit_product/{id}', ['as' => 'admingate.view_edit_product.{id}', 'uses' => 'ProductAdminController@view_edit_product']);
	
	
	
	Route::post('/add_product', ['as' => 'admingate.add_product', 'uses' => 'ProductAdminController@add_new_product']);
	
	Route::put('/edit_product', ['as' => 'admingate.edit_product', 'uses' => 'ProductAdminController@edit_product']);
	
	
	Route::delete('/delete_product', ['as' => 'admingate.delete_product', 'uses' => 'ProductAdminController@delete_product']);
	/*
		end of product
	*/
    //cleaning tips
	Route::get('/cleaningtips', ['as' => 'admingate.cleaningtips', 'uses' => 'ArticleAdminController@view_cleaning_tips']);
	
	Route::put('/edit_cleaningtips', ['as' => 'admingate.edit_cleaningtips', 'uses' => 'ArticleAdminController@edit_cleaning_tips']);

    /*
		blog
	*/
	//get
	Route::get('/blog', ['as' => 'admingate.blog', 'uses' => 'ArticleAdminController@view_blog']);
	Route::get('/add_new_blog', ['as' => 'admingate.add_new_blog', 'uses' => 'ArticleAdminController@view_add_blog']);
	Route::get('/bloglist', ['as' => 'admingate.bloglist', 'uses' => 'ArticleAdminController@get_blog_list']);
	Route::get('/vieweditblog/{id}', ['as' => 'admingate.vieweditblog.{id}', 'uses' => 'ArticleAdminController@view_edit_blog']);
	
	
	//post
	Route::post('/add_blog', ['as' => 'admingate.add_blog', 'uses' => 'ArticleAdminController@add_blog']);
	
	//put
	Route::put('/edit_blog', ['as' => 'admingate.edit_blog', 'uses' => 'ArticleAdminController@edit_blog']);
	
	Route::delete('/delete_blog', ['as' => 'admingate.delete_blog', 'uses' => 'ArticleAdminController@delete_blog']);
	
	/*
		end of blog
	*/
    //contact
	Route::get('/contact', function()
	{
		return View::make('pages.admin.contact.contact');
	});

});

//Route::get('adminpanel', function()
//{
//	return View::make('pages.admin.dashboard');
//});