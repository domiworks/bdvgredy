<!DOCTYPE HTML>
<html>
	<head>
		<title>Product List</title>
		
		@include('includes.head')
		
		<link rel="stylesheet" href="assets/js/customscrollbar/jquery.mCustomScrollbar.css" />
	</head>
	
	<body>
		@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<nav id="nav_sec">
				<div class="topleft_logo">
					<a href="{{ URL::route('',array()) }}">
						<div class="sprite header_logo"></div>
					</a>
				</div>
				
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
				Rubirosa
				</span>
			</div>

			<nav id="nav_sec">
				<div id="menu_area">
					<ul>
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
		<script type="text/javascript" src="{{ asset('/assets/js/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/carousel.js') }}"></script>
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript" src="{{ asset('/assets/js/jquery.easyNavScroll_defscroll.js') }}"></script>
		@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script type="text/javascript" src="{{ asset('/assets/js/jquery.easyNavScroll.js') }}"></script>
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
						$('body').mCustomScrollbar({
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