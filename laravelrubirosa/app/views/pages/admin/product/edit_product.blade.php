<div class="c_12">
	<div class="g_12">
		<h1>
			Edit Product
		</h1>
		
		<div class="admin_tools_header">
			<a class="back_to_category" id="admin_product_trigger" href="javascript:void(0)" >
				back to product
			</a>
			
		</div>
		
		<div class="add_new_stuff_form">
		{{ Form::open(array('url' => 'admingate/edit_product','method'=>'put','files'=>'true')) }}
			<div class="row">
				{{ Form::label('category', 'Category'); }}
				{{ Form::select('category', $categories,array('value'=>$product->id_category)); }}
			</div>
			
			
			<div class="row">
				{{ Form::label('product_title', 'Product Name'); }}
				{{ Form::text('product_title',$product->name, Input::old('product_title')) }}
			</div>
			
			<div class="row">
				{{ Form::label('product_price', 'Product Price'); }}
				{{ Form::text('product_price',$product->price, Input::old('product_price')) }}
			</div>
			
			<div class="row">
				{{ Form::label('product_desc', 'Product Description'); }}
				<textarea name="product_desc" class="product_desc_textarea">{{$product->description}}</textarea>
				<script>
					$('.product_desc_textarea').jqte();
				</script>
			</div>
			
			<div class="g_7">
				<div class="row">
					<img src="{{$product->photo}}" alt="" width="150"/>
					{{ Form::label('product_thumbnail', 'Product Thumbnail'); }}
					{{ Form::file('product_thumbnail'); }}
				</div>
				
				<div class="row">
					{{ Form::label('product_slideshow', 'Product Slideshow'); }}
					<span class="clear"></span>
					@if(count($gallery)>0)
						<img src="{{$gallery[0]->photo}}" alt="" width="200"/>
					@else
						<img src="" alt="" width="200"/>
					@endif
					{{ Form::label('slideshow', 'Slide 1'); }}
					{{ Form::file('slide_1'); }}	
					<span class="clear"></span>
					@if(count($gallery)>1)
						<img src="{{$gallery[1]->photo}}" alt="" width="200"/>
					@else
						<img src="" alt="" width="200"/>
					@endif
					{{ Form::label('slideshow', 'Slide 2'); }}
					{{ Form::file('slide_2'); }}
					<span class="clear"></span>
					@if(count($gallery)>2)
						<img src="{{$gallery[2]->photo}}" alt="" width="200"/>
					@else
						<img src="" alt="" width="200"/>
					@endif
					{{ Form::label('slideshow', 'Slide 3'); }}
					{{ Form::file('slide_3'); }}	
					<span class="clear"></span>
					@if(count($gallery)>3)
						<img src="{{$gallery[3]->photo}}" alt="" width="200"/>
					@else
						<img src="" alt="" width="200"/>
					@endif
					{{ Form::label('slideshow', 'Slide 4'); }}
					{{ Form::file('slide_4'); }}
					<span class="clear"></span>
					@if(count($gallery)>4)
						<img src="{{$gallery[4]->photo}}" alt="" width="200"/>
					@else
						<img src="" alt="" width="200"/>
					@endif
					{{ Form::label('slideshow', 'Slide 5'); }}
					{{ Form::file('slide_5'); }}
				</div>
			</div>
			<div class="g_4">
				{{ Form::label('product_hex', 'Product Hex Color'); }}
				<span class="clear"></span>
				{{ Form::label('hex_1', 'Hex', array('style' => 'width: 50px;')); }}
				{{ Form::text('hex_1',$product->hex1, Input::old('hex_1'), array('style' => 'width: 150px;')) }}
				<span class="clear"></span>
				{{ Form::label('hex_2', 'Hex', array('style' => 'width: 50px;')); }}
				{{ Form::text('hex_2',$product->hex2, Input::old('hex_2'), array('style' => 'width: 150px;')) }}
				<span class="clear"></span>
				{{ Form::label('hex_3', 'Hex', array('style' => 'width: 50px;')); }}
				{{ Form::text('hex_3',$product->hex3, Input::old('hex_3'), array('style' => 'width: 150px;')) }}
			</div>
			<span class="clear">
			</span>
			<input type='hidden' name='id_product' value='{{$product->id}}' />
			{{ Form::submit('Edit Product'); }}
			{{ Form::close() }}
		</div>
		
	</div>
</div>