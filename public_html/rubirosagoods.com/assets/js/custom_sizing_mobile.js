function updateSize(){
	// Get the dimensions of the viewport
	var width = $(window).width();
	var height = $(window).height();
	var navHeight = $('#nav_sec').height();
	
	$('#landing_sec').height(height);
	$('.landing_spc, .blog_page_sec, .blog_list, .blog_content').height(height - navHeight);
	$('#main_cat_sec').height($(window).height() - 88);
	$('#cleantips_sec').height($(window).height() - 88);
	$('#blog_sec').height($(window).height() - 88);
		
	$('.main_cat_node').width('100%');
	$('.main_cat_node').height($('#main_cat_sec').height()*0.33333333333333);
	
	$('#nav_sec').height(height + 96);
	$('#listnav_sec').height(height + 96);
	$('#cleantips_sec .left_spc, #cleantips_sec .right_spc').height($('#cleantips_sec').height()*0.5);
	$('#blog_sec .left_spc, #blog_sec .right_spc').height($('#blog_sec').height()*0.5);
	
};

$(document).ready(updateSize);
$(window).resize(updateSize);
$(window).on("orientationchange",function(){
  updateSize();
});