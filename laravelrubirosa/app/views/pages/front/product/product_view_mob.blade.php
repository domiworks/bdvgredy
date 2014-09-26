@extends('layouts.product_view_mob')
@section('content')
<section id="product_view_mobile" >
			<div class="slider_viewport">
				<!-- the viewport -->
				<div class="m-carousel m-fluid m-carousel-photos">
					<!-- the slider -->
					<div class="m-carousel-inner">
						<!-- the items -->
						@for($i=0;$i<count($galleries);$i++)
							@if($i == 0)
								<div class="m-item m-active">
									{{ HTML::image($galleries[$i]->photo, $alt="Images", $attributes = array('width'=>'640')) }}
								</div>
							@else
								<div class="m-item">
									{{ HTML::image($galleries[$i]->photo, $alt="Images", $attributes = array('width'=>'640')) }}
								</div>
							@endif
						@endfor
						
						
						<!--<div class="m-item">
							<img src="assets/product_images/0_product_name/0_slide/0_1.jpg" width="640">
						</div>
						<div class="m-item">
							<img src="assets/product_images/0_product_name/0_slide/0_2.jpg" width="640">
						</div>
						<div class="m-item">
							<img src="assets/product_images/0_product_name/0_slide/0_3.jpg" width="640"/>
						</div>
						<div class="m-item">
							<img src="assets/product_images/0_product_name/0_slide/0_4.jpg" width="640"/>
						</div>-->
					</div>
					<!-- the controls -->
					<div class="m-carousel-controls m-carousel-bulleted">
						<!--<a href="#" data-slide="prev">Previous</a>-->
						@for($i=0;$i<count($galleries);$i++)
							@if($i == 0)
								<a href="#" data-slide="{{$i+1}}" class="m-active">{{$i+1}}</a>
							@else
								<a href="#" data-slide="{{$i+1}}">{{$i+1}}</a>
							@endif
						@endfor
						<!--<a href="#" data-slide="1" class="m-active">1</a>
						<a href="#" data-slide="2">2</a>
						<a href="#" data-slide="3">3</a>
						<a href="#" data-slide="4">4</a>
						<a href="#" data-slide="5">5</a>
						<a href="#" data-slide="6">5</a>
						<!--<a href="#" data-slide="next">Next</a>-->
					</div>
				</div>
			</div>
			
			<div class="pu_product_cntnt" style="">
				
				<div class="info_c">
					<span class="sprite pu_close">
					</span>
					<div class="item_info">
						<span class="item_cat">{{$products[0]->name_category}}</span>
						<span class="item_color"> Color </span>
						
						<span class="clear"></span>
						
						<span class="item_title">{{$products[0]->name_product}}</span>
						<ul class="color_class">
							<li class="color_val" style="background: #{{$products[0]->hex1_product}};">
							</li>
							<li class="color_val"  style="background: #{{$products[0]->hex2_product}};">
							</li>
							<li class="color_val" style="background: #{{$products[0]->hex3_product}};">
							</li>
						</ul>
						
						<span class="clear"></span>
						
						<p id="" class="desc">
							{{$products[0]->desc_product}}
						</p>
						
						<span class="item_price" style="margin-top: 40px; font-size: 24">{{$products[0]->price_product}}</span>
					</div>
				</div>
			</div>
			
		</section>
<script>
	$(document).ready(function(){
		$('.item_price').text(toRp($('.item_price').text()));
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
</script>
@stop