<!DOCTYPE HTML>
<html>
	<head>
		<title>Product View</title>
		
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
				<ul class="breadcrumb">
					<li>
						<a href="main_category">
							Men
						</a>
					</li>
					<li>
						<a href="category">
							Belt
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
				Product View
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
		
		
		<script type="text/javascript" src="{{ asset('/assets/js/jquery.easing.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/carousel.js') }}"></script>
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript" src="{{ asset('/assets/js/jquery.easyNavScroll_defscroll.js') }}"></script>
		@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script type="text/javascript" src="{{ asset('/assets/js/jquery.easyNavScroll.js') }}"></script>
		@endif
		
		<script src="{{ asset('/assets/js/customscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		
		<script>$('.m-carousel').carousel()</script>
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript">
				function updateSize(){
					// Get the dimensions of the viewport
					var width = $(window).width();
					var height = $(window).height();
					var navHeight = $('#nav_sec').height();
					
					$('body').css('overflow-x','hidden');//.css('overflow-x','visible');
					$('body').mousewheel(function(event, delta) {
						this.scrollLeft -= (delta * 50);
						event.preventDefault();
					});
					
					$('#product_view_mobile').css('min-height', height);
				};
				$(document).ready(updateSize);
				$(window).resize(updateSize);
			</script>
		@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script type="text/javascript">
				function updateSize(){
					// Get the dimensions of the viewport
					var width = $(window).width();
					var height = $(window).height();
					var navHeight = $('#nav_sec').height();
					
					$('body').css('overflow-y','hidden').css('overflow-x','visible');
					$('body').mousewheel(function(event, delta) {
						this.scrollLeft -= (delta * 50);
						event.preventDefault();
					});
					
					$('#product_list_sec').height(height - navHeight);
					var productBox = ((height - navHeight) / 2); // w/o padding and border
					$('.product_node').height(productBox - 2).width(productBox - 1);
				};
				
				function setLebarContainer(){
					var widthProCol = $('.product_col2vert').width();
					var i = 0;
					
					$('.product_col2vert').each(
						function(){
							i++;
						}
					);
					
					var totalWidthProCol = i*widthProCol;
					
					$('#product_list_sec').width(totalWidthProCol);
					
				
				};
				
				$(document).ready(updateSize).ready(setLebarContainer);
				$(window).resize(updateSize).ready(setLebarContainer);
			</script>
		@endif
		
		@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script type="text/javascript">
			$(document).ready(function() {
				$(".product_node").click(function() {
					$(".pu_c").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
					$("body").css('overflow-x','hidden');
				});
			});
			
			/*external container area exit trigger*/
			$('.pu_close').click(function(){
				$( ".pu_c" ).fadeOut( 200, function(){});
				$("body").css('overflow-x','visible');
			});
			$('.pu_c').click(function (e)
				{
					var container = $('.pu_cell');

					if (container.is(e.target) )// if the target of the click is the container...
					{
						$( ".pu_c" ).fadeOut( 200, function(){});
						$("body").css('overflow-x','visible');
					}
				});
				Slider = $('#slider').Swipe({  
					auto: 3000,  
					continuous: true  
				}).data('Swipe');  
			$('.pu_c').css('display','none');
		</script>
		@endif
		
		
		@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script>
				(function($){
					$(window).load(function(){
						$('body').mCustomScrollbar({
							axis:"x",
							theme:"dark",
							scrollInertia:50
						});
					});
				})(jQuery);
			</script>
		@endif
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript" src="{{ asset('/assets/js/custom_sidemenu_control.js') }}"></script>
		@endif
		
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<script type="text/javascript" src="{{ asset('/assets/js/custom_sizing_mobile.js') }}"></script>
		@endif
	</body>
</html>