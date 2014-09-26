$( "#menu_trig" ).click(function() {
		$(this).removeClass("openslide");
		$(this).addClass("closeslide");
});
$( "#nav_sec #closer_area, #nav_sec #menu_area ul li a" ).click(function() {
		$("#menu_trig").removeClass("closeslide");
		$("#menu_trig").addClass("openslide");
});


$(document).ready(function() {
	$('#menu_trig').on('click',function(){
		$('#nav_sec').animate({
			"margin-left": "0px"
			}, 400, 'easeOutExpo',function() {
				// Animation complete.
		
		});		
		$('#nav_sec').siblings().not("#listnav_sec").animate({
			"left": "500px"
			}, 400, 'easeOutExpo',function() {
				// Animation complete.
		
		});	
		$('#mob_head').animate({
			"left": "512px"
			}, 400, 'easeOutExpo',function() {
				// Animation complete.
		
		});					
	});
	$('#nav_sec #closer_area').on('click',function(){
		$('#nav_sec').animate({
			"margin-left": "-600px"
			}, 400, 'easeOutExpo', function() {
				// Animation complete.
		
		});		
		$('#nav_sec').siblings().not("#listnav_sec").animate({
			"left": "0px"
			}, 400, 'easeOutExpo', function() {
				// Animation complete.
		
		});		
	});
							
	$('#nav_sec #menu_area ul li a').click(function(evt){  
		$('#nav_sec').animate({
			"margin-left": "-600px"
			}, 400, 'easeOutExpo', function() {
				// Animation complete.
		
		});		
		$('#nav_sec').siblings().not("#listnav_sec").animate({
			"left": "0px"
			}, 400, 'easeOutExpo', function() {
				// Animation complete.
		
		});		
	});
});