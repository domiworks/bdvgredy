@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
	<nav id="nav_sec">
		<div class="topleft_logo">
			<a href="index.php">
				<div class="sprite header_logo"></div>
			</a>
		</div>
		
		<ul class="nav_spc">
			<li><a href="#story_sec">OUR STORY</a></li>	
			<li><a href="#main_cat_sec">PRODUCT LINE</a></li>	
			<li><a href="#cleantips_sec">CLEANING TIPS</a></li>	
			<li><a href="#blog_sec">BLOG</a></li>	
			<li><a href="#blog_sec">CONTACT</a></li>	
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
			<ul class="nav_spc">
				<li style="text-indent: 80px; line-height:180px;">
					<img src="./assets/img/text_only.png" width="300"/>
				</li>
				<li>
					<a href="#story_sec">OUR STORY</a>
				</li>
				<li>
					<a href="#main_cat_sec">PRODUCT LINE</a>
				</li>
				<li>
					<a href="#cleantips_sec">CLEANING TIPS</a>
				</li>
				<li>
					<a href="#blog_sec">BLOG</a>
				</li>
				<li>
					<a href="#">CONTACT US</a>
				</li>
			</ul>
		</div>
		<a id="closer_area">
		</a>
	</nav>
@endif