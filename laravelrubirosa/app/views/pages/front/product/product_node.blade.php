@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
	<a id="product_" class="product_node" href="product/view_mob">
@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
	<a id="product_" class="product_node" href="javascript:void(0)">
@endif
	<div class="item_image">
		@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
			<img src="assets/product_images/0_product_name/0_product_name_mob.jpg" height="100%"/>
		@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
			<img src="assets/product_images/0_product_name/0_product_name.jpg" height="100%"/>
		@endif
	</div>
	<div class="item_info">
		<span class="item_cat"> Belt </span>
		<span class="item_title"> Belt One </span>
		<!--<span class="item_price"> IDR 370.000 </span>-->
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