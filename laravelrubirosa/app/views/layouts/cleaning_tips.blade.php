<!DOCTYPE HTML>
<html>
	<head>
		<title>Cleaning Tips</title>
		
		@include('includes.head')
		
		<link rel="stylesheet" href="{{ asset('/assets/js/customscrollbar/jquery.mCustomScrollbar.css') }}" />
	</head>
	
	<body>
		@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<nav id="nav_sec">
				<div class="topleft_logo">
					<a href="{{ URL::route('',array()) }}">
						<div class="sprite header_logo"></div>
					</a>
				</div>
				<ul class="breadcrumb">
						<li>
							<a href="{{ URL::route('cleaning_tips',array()) }}">
								Cleaning Tips
							</a>
						</li>
					</ul>
				<ul class="nav_spc">
					@include('includes.navigation.non_index')
				</ul>
			</nav>
		@elseif ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript" >
				$('body').css('overflow-x', 'hidden');
			</script>
			<div id="mob_head">
				<a id="menu_trig" class="openslide">
				</a>
				<span class="head_addr">
				Cleaning Tips
				</span>
				<!--<a id="listmenu_trig" class="openslideblog">
				</a>-->
			</div>

			<nav id="nav_sec">
				<div id="menu_area">
					<ul class="nav_spc">
						<li style="text-indent: 80px; line-height:180px;">
							<img src="./assets/img/text_only.png" width="300"/>
						</li>
						@include('includes.navigation.non_index')
					</ul>
				</div>
				<a id="closer_area">
				</a>
			</nav>
		@endif
		
		@yield('content')
		
		 
		<!-- ------- --------- --------- --------- --------- --------- --------- --------- --------- --------- 
		------- Tempatkan seluruh javascript dibawah page https://developer.yahoo.com/performance/rules.html#js_bottom 
		--------- --------- --------- --------- --------- --------- --------- --------- --------- ------- -->
		<script type="text/javascript" src="{{ asset('/assets/js/jquery-1.11.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
		
		<script type="text/javascript" src="{{ asset('/assets/js/jquery.easing.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/jquery.easyNavScroll.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/carousel.js') }}"></script>
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script>
			$( "#listmenu_trig" ).click(function() {
					$(this).removeClass("openslideblog");
					$(this).addClass("closeslide");
			});
			$( "#listnav_sec #closer_area, #listnav_sec #menu_area ul li a" ).click(function() {
					$("#listmenu_trig").removeClass("closeslide");
					$("#listmenu_trig").addClass("openslideblog");
			});


			$(document).ready(function() {
				$('#listmenu_trig').on('click',function(){
					$('#listnav_sec').animate({
						"margin-left": "40px"
						}, 400, 'easeOutExpo',function() {
							// Animation complete.
					
					});		
					$('#listnav_sec').siblings().not("#nav_sec").animate({
						"left": "-500px"
						}, 400, 'easeOutExpo',function() {
							// Animation complete.
					
					});	
					$('#mob_head').animate({
						"left": "-512px"
						}, 400, 'easeOutExpo',function() {
							// Animation complete.
					
					});					
				});
				$('#listnav_sec #closer_area').on('click',function(){
					$('#listnav_sec').animate({
						"margin-left": "640px"
						}, 400, 'easeOutExpo', function() {
							// Animation complete.
					
					});		
					$('#listnav_sec').siblings().not("#nav_sec").animate({
						"left": "0px"
						}, 400, 'easeOutExpo', function() {
							// Animation complete.
					
					});		
				});
										
				$('#listnav_sec #menu_area ul li a').click(function(evt){  
					$('#listnav_sec').animate({
						"margin-left": "640px"
						}, 400, 'easeOutExpo', function() {
							// Animation complete.
					
					});		
					$('#listnav_sec').siblings().not("#nav_sec").animate({
						"left": "0px"
						}, 400, 'easeOutExpo', function() {
							// Animation complete.
					
					});		
				});
			});
			</script>			
		@endif

		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript" src="{{ asset('/assets/js/jquery.easyNavScroll_defscroll.js') }}"></script>
		@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script type="text/javascript" src="{{ asset('/assets/js/jquery.easyNavScroll.js') }}"></script>
			<script type="text/javascript">
				$('body').css('overflow','hidden');
			</script>
		@endif
		
		<script src="{{ asset('/assets/js/customscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript" src="{{ asset('/assets/js/custom_sidemenu_control.js') }}"></script>
		@endif
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript" src="{{ asset('/assets/js/custom_sizing_mobile.js') }}"></script>
		@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script type="text/javascript" src="{{ asset('/assets/js/custom_sizing_desktop.js') }}"></script>
		@endif
		
		@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script>
				(function($){
					$(window).load(function(){
						$('.blog_list, .blog_content').mCustomScrollbar({
							axis:"y",
							theme:"dark",
							scrollInertia:500
						});
					});
				})(jQuery);
			</script>
		@endif
	</body>
</html>