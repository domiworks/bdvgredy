function updateSize(){
	// Get the dimensions of the viewport
	var width = $(window).width();
	var height = $(window).height();
	var navHeight = $('#nav_sec').height();
	
	$('#landing_sec').height(height);
	$('.landing_spc, .blog_page_sec, .blog_list, .blog_content').height(height - navHeight);
	$('#main_cat_sec').height(height - navHeight);
	$('#cleantips_sec').height(height - navHeight);
	$('#blog_sec').height(height - navHeight);
	
	$('.main_cat_node').width('33.333333333333333333333333333%');
	
};

$(document).ready(updateSize);
$(window).resize(updateSize);
$(window).on("orientationchange",function(){
  updateSize();
});