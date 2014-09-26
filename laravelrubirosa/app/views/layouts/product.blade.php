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
				<ul class="breadcrumb">
					<li>
						<a href="../main_category">
							@if(Category::find($products[0]->id_category)->gender == 0)
								Man
							@elseif(Category::find($products[0]->id_category)->gender == 1)
								Woman
							@else
								Unisex
							@endif
						</a>
					</li>
					<li>
						@if(Category::find($products[0]->id_category)->gender == 0)
							<a href="../category/man">
								{{Category::find($products[0]->id_category)->name}}
							</a>
						@elseif(Category::find($products[0]->id_category)->gender == 1)
							<a href="../category/woman">
								{{Category::find($products[0]->id_category)->name}}
							</a>
						@else
							<a href="../category/unisex">
								{{Category::find($products[0]->id_category)->name}}
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
				Products
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
			
		<!--POP UP AREA ------- DESKTOP and TABLET ONLY -->
			@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<div id="pu_product" class="pu_c" style="z-index:99999; display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
				<div class="tableed">
					<div class="celled pu_cell" style="">
						<div class="pu_product_cntnt" style="">
							<div class="slider_viewport" style="width: 848px; display">
							
								<!-- the viewport -->
								<div class="m-carousel m-fluid m-carousel-photos">
									<!-- the slider -->
									<div class="m-carousel-inner">
										<!-- the items -->
										<div class="m-item m-active">
											<img src="./assets/product_images/0_product_name/0_slide/0_0.jpg" height="636">
										</div>
										<div class="m-item">
											<img src="./assets/product_images/0_product_name/0_slide/0_1.jpg" height="636">
										</div>
										<div class="m-item">
											<img src="./assets/product_images/0_product_name/0_slide/0_2.jpg" height="636">
										</div>
										<div class="m-item">
											<img src="./assets/product_images/0_product_name/0_slide/0_3.jpg" height="636"/>
										</div>
										<div class="m-item">
											<img src="./assets/product_images/0_product_name/0_slide/0_4.jpg" height="636"/>
										</div>
									</div>
									<!-- the controls -->
									<div class="m-carousel-controls m-carousel-bulleted">
										<!--<a href="#" data-slide="prev">Previous</a>-->
										<a href="#" data-slide="1" class="m-active">1</a>
										<a href="#" data-slide="2">2</a>
										<a href="#" data-slide="3">3</a>
										<a href="#" data-slide="4">4</a>
										<a href="#" data-slide="5">5</a>
										<!--<a href="#" data-slide="next">Next</a>-->
									</div>
								</div>
							</div> 
							<div class="info_c">
								<span class="sprite pu_close">
								</span>
								<div class="item_info">
									<span class="item_cat preview_cat"> Belt </span>
									<span class="item_title preview_title"> Belt One </span>
									
									<p id="" class="desc preview_desc">
										Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.
									</p>
									
									<span class="item_color"> Color </span>
									<ul class="color_class">
										<li class="color_val" id='hex1'>
										</li>
										<li class="color_val" id='hex2'>
										</li>
										<li class="color_val" id='hex3'>
										</li>
									</ul>
									<span class="item_price" id='preview_price' style="margin-top: 40px; font-size: 24"> IDR 370.000 </span>
								</div>
								
								
							</div>
							
						</div>
					</div>
				</div>
			</div>	
			@endif
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
					$id=$(this).next().val();
					$.ajax({
						type: 'GET',
						url: '../get_product/'+$id,
						success: function(response){
							$('.preview_cat').html(response[0].name_category);
							$('.preview_title').html(response[0].name_product);
							$('.preview_desc').html(response[0].desc_product);
							$('#hex1').css('background','#'+response[0].hex1_product);
							$('#hex2').css('background','#'+response[0].hex2_product);
							$('#hex3').css('background','#'+response[0].hex3_product);
							$('#preview_price').html(toRp(response[0].price_product));
							$.ajax({
								type: 'GET',
								url: '../get_gallery/'+$id,
								success: function(response){
									var list = "";
									var list_command = "";
									for($i=0;$i<response.length;$i++){
										if($i == 0){
											list+="<div class='m-item m-active'>";
											list+="<img src='../"+response[$i].photo+"' height='636'>";
											list+="</div>";
											list_command+="<a href='#' data-slide='"+($i+1)+"' class='m-active'>"+($i+1)+"</a>";
										}
										else{
											list+="<div class='m-item'>";
											list+="<img src='../"+response[$i].photo+"' height='636'>";
											list+="</div>";
											list_command+="<a href='#' data-slide='"+($i+1)+"'>"+($i+1)+"</a>";
										}
									}
									$('.m-carousel-inner').html(list);
									$('.m-carousel-controls').html(list_command);
									$('.m-carousel').carousel();
									
								},
								error: function(jqXHR, textStatus, errorThrown){
									alert(errorThrown);
								}
							},'json');
						},
						error: function(jqXHR, textStatus, errorThrown){
							alert(errorThrown);
						},
						complete:function(){
							
							$(".pu_c").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
							$("body").css('overflow-x','hidden');
						}
					},'json');
				});
			});
			
			function toRp(angka){
				var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
				var rev2    = '';
				for(var i = 0; i < rev.length; i++){
					rev2  += rev[i];
					if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
						rev2 += '.';
					}
				}
				return 'IDR ' + rev2.split('').reverse().join('');
				//return 'IDR ' + rev2.split('').reverse().join('') + ',00';
			}
			
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
		<script></script>
	</body>
</html>