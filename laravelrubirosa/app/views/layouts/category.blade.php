<!DOCTYPE HTML>
<html>
	<head>
		<title>Category List</title>
		
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
						@if($gender_code == 0)
							<a href="{{ URL::route('main_category',array()) }}">
								Man
							</a
						@elseif($gender_code == 1)
							<a href="{{ URL::route('main_category',array()) }}">
								Woman
							</a>
						@else
							<a href="{{ URL::route('main_category',array()) }}">
								Unisex
							</a>
						@endif
						
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
				Male Category
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
		<script type="text/javascript" src="{{ asset('/assets/js/jquery.easyNavScroll.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/js/carousel.js') }}"></script>
		
		<script src="{{ asset('/assets/js/customscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
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
					$('#category_list_sec').height(height - navHeight);
					var productBox = ((height - navHeight)); // w/o padding and border
					$('.category_node').height(productBox - 2).width((width);
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
					$('#category_list_sec').height(height - navHeight);
					var productBox = ((height - navHeight)); // w/o padding and border
					$('.category_node').height(productBox - 2).width((width/4) - 1);
				};
				
				function getProductCol(){
					var widthProCol = $('.category_col2vert').width();
					var i = 0;
					$('.category_col2vert').each(
						function(){
							i++;
						}
					);
					var totalWidthProCol = i*widthProCol;
					$('#category_list_sec').width(totalWidthProCol);
				};
				
				$(document).ready(updateSize).ready(getProductCol);
				$(window).resize(updateSize).ready(getProductCol);
			</script>		
		@endif
		
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
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
		
		@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<script>
				$('.box').each(function() {
					//set size
					var th = $(this).height();//box height
					var tw = $(this).width();//box width
					var im = $(this).children('img');//image
					var ih = im.height();//inital image height
					var iw = im.width();//initial image width
					if (ih>iw) {//if portrait
						im.addClass('wh').removeClass('ww');//set width 100%
					} else {//if landscape
						im.addClass('ww').removeClass('wh');//set height 100%
					}
					//set offset
					var nh = im.height();//new image height
					var nw = im.width();//new image width
					var hd = (nh-th)/2;//half dif img/box height
					var wd = (nw-tw)/2;//half dif img/box width
					if (nh<nw) {//if portrait
						im.css({marginLeft: '-'+wd+'px', marginTop: 0});//offset left
					} else {//if landscape
						im.css({marginTop: '-'+hd+'px', marginLeft: 0});//offset top
					}
				});
			</script>
		@endif
		
		
	</body>
</html>