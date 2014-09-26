//sidebar home
$('body').on('click','#admin_category_trigger',function(){
	//$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admingate/category');
});

	$('body').on('click','#show_new_category',function(){
	//$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admingate/add_new_category');
	});



$('body').on('click','#admin_product_trigger',function(){
	//$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admingate/product');
});
	$('body').on('click','#show_new_product',function(){
		//$( ".loader" ).fadeIn( 200, function(){});
		 $('.admin_control_panel').load('admingate/add_new_product');
	});

$('body').on('click','#admin_cleaningtips_trigger',function(){
	//$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admingate/cleaningtips');
});


$('body').on('click','#admin_blog_trigger',function(){
	//$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admingate/blog');
});
	$('body').on('click','#show_new_blog',function(){
		//$( ".loader" ).fadeIn( 200, function(){});
		 $('.admin_control_panel').load('admingate/add_new_blog');
	});

$('body').on('click','#admin_contact_trigger',function(){
	//$( ".loader" ).fadeIn( 200, function(){});
	 $('.admin_control_panel').load('admingate/contact');
});
