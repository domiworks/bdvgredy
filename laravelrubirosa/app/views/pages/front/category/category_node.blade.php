<a id="category" class="category_node" href="product">
	<div class="item_image box">
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<img src="assets/category_images/category_picture_mob.jpg" />
		@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<img src="assets/category_images/category_picture.jpg" />
		@endif
	</div>
	<div class="item_info">
		<span class="item_category">Category Belt</span>
	</div>
	<div class="product_node_hvr">
		<div class="tableed">
			<div class="celled">
				<div id="pu_poper" class="look_closer">
					<input type="hidden" id="id_pu_poper" name="id_pu_poper" value="0_product_name">
					<p class="look_closer_txt">+</p>
				</div>
			</div>
		</div>
	</div>
</a>