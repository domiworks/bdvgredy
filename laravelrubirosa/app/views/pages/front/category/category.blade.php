@extends('layouts.category')
@section('content')
<section id="category_list_sec">
	@foreach($categories as $category)
		<!-- category container vert -->
		<div class="category_col2vert">		
			<!-- category 00 -->
			<a id="category" class="category_node" href="../product/{{$category->id}}">
				<div class="item_image box">
					@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
						{{ HTML::image($category->phone_thumbnail, $alt="DRCSports", $attributes = array()) }}
					@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}

						{{ HTML::image($category->desktop_thumbnail, $alt="DRCSports", $attributes = array()) }}
					@endif
				</div>
				<div class="item_info">
					<span class="item_category">{{$category->name}}</span>
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
		</div>
	@endforeach
			<!-- category container vert
			<div class="category_col2vert">		
				<!-- category 00
				@include('pages.front.category.category_node')
			</div>
			
			<!-- category container vert
			<div class="category_col2vert">		
				<!-- category 00
				@include('pages.front.category.category_node')
			</div>
			
			<!-- category container vert
			<div class="category_col2vert">		
				<!-- category 00
				@include('pages.front.category.category_node')
			</div>
			
			<!-- category container vert
			<div class="category_col2vert">		
				<!-- category 00
				@include('pages.front.category.category_node')
			</div>-->
</section>	
@stop