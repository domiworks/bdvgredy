@extends('layouts.product')
@section('content')

		<section id="product_list_sec">	
			<!-- product container vert -->
			@if($products == NULL)
			 
			@else
				@for($i=0;$i<count($products);$i+=2)
					<div class="product_col2vert">	
						<!-- product 00 -->
						@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
							<a id="product_" class="product_node" href="../view_mob/{{$products[$i]->id}}">
						@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
							<a id="product_" class="product_node" href="javascript:void(0)">
							
						@endif
						
						<div class="item_image">
							@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
								{{ HTML::image($products[$i]->photo, $alt="DRCSports", $attributes = array('height'=>'100%')) }}
							@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
								{{ HTML::image($products[$i]->photo, $alt="DRCSports", $attributes = array('height'=>'100%')) }}
							@endif
						</div>
						<div class="item_info">
							<span class="item_cat">{{Category::find($products[$i]->id_category)->name}}</span>
							<span class="item_title">{{$products[$i]->name}}</span>
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
						<input type='hidden' value="{{$products[$i]->id}}">
						
						@if(count($products)>$i+1)
							<!-- product 00 -->
							@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
								<a id="product_" class="product_node" href="../view_mob/{{$products[$i+1]->id}}">
							@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
								<a id="product_" class="product_node" href="javascript:void(0)">
								
							@endif
							
							<div class="item_image">
								@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
									{{ HTML::image($products[$i+1]->photo, $alt="DRCSports", $attributes = array('height'=>'100%')) }}
								@elseif ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
									{{ HTML::image($products[$i+1]->photo, $alt="DRCSports", $attributes = array('height'=>'100%')) }}
								@endif
							</div>
							<div class="item_info">
								<span class="item_cat">{{Category::find($products[$i+1]->id_category)->name}}</span>
								<span class="item_title">{{$products[$i+1]->name}}</span>
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
						<input type='hidden' value="{{$products[$i+1]->id}}">
						@endif
					</div>
				@endfor
			@endif
			
			<!-- product container vert 
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>
			
			<!-- product container vert
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>
			
			<!-- product container vert
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>
			
			<!-- product container vert
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>
			
			<!-- product container vert
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>
			
			<!-- product container vert
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>
			
			<!-- product container vert
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>
			
			<!-- product container vert
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>
			
			<!-- product container vert
			<div class="product_col2vert">		
				<!-- product 00
				@include('pages.front.product.product_node')
				<!-- product 00
				@include('pages.front.product.product_node')
			</div>-->
			
			
			
			
			
			
		</section>
@stop