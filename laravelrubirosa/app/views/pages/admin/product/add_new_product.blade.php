<div class="c_12">
	<div class="g_12">
		<h1>
			Add New Product
		</h1>
		
		<div class="admin_tools_header">
			<a class="back_to_category" id="admin_product_trigger" href="javascript:void(0)" >
				back to product
			</a>
			
		</div>
		
		<div class="add_new_stuff_form">
		{{ Form::open(array('url' => 'admingate/add_product','method'=>'post','files'=>'true')) }}
			<div class="row">
				{{ Form::label('category', 'Category'); }}
				{{ Form::select('category',$categories); }}
			</div>
			
			<div class="row">
				{{ Form::label('product_title', 'Product Name'); }}
				{{ Form::text('product_title', Input::old('product_title')) }}
			</div>
			
			<div class="row">
				{{ Form::label('product_price', 'Product Price'); }}
				{{ Form::text('product_price', Input::old('product_price')) }}
			</div>
			
			<div class="row">
				{{ Form::label('product_desc', 'Product Description'); }}
				<textarea name="product_desc" class="product_desc_textarea"></textarea>
				<script>
					$('.product_desc_textarea').jqte();
				</script>
			</div>
			
			<div class="g_7">
				<div class="row">
					{{ Form::label('product_thumbnail', 'Product Thumbnail'); }}
					{{ Form::file('product_thumbnail'); }}
				</div>
				
				<div class="row">
					{{ Form::label('product_slideshow', 'Product Slideshow'); }}
					<span class="clear"></span>
					{{ Form::label('slideshow', 'Slide 1'); }}
					{{ Form::file('slide_1'); }}	
					<span class="clear"></span>
					{{ Form::label('slideshow', 'Slide 2'); }}
					{{ Form::file('slide_2'); }}
					<span class="clear"></span>
					{{ Form::label('slideshow', 'Slide 3'); }}
					{{ Form::file('slide_3'); }}	
					<span class="clear"></span>
					{{ Form::label('slideshow', 'Slide 4'); }}
					{{ Form::file('slide_4'); }}
					<span class="clear"></span>
					{{ Form::label('slideshow', 'Slide 5'); }}
					{{ Form::file('slide_5'); }}
				</div>
			</div>
			<div class="g_4">
				{{ Form::label('product_hex', 'Product Hex Color'); }}
				<span class="clear"></span>
				{{ Form::label('hex_1', 'Hex', array('style' => 'width: 50px;')); }}
				{{ Form::text('hex_1', Input::old('hex_1'), array('style' => 'width: 150px;')) }}
				<span class="clear"></span>
				{{ Form::label('hex_2', 'Hex', array('style' => 'width: 50px;')); }}
				{{ Form::text('hex_2', Input::old('hex_2'), array('style' => 'width: 150px;')) }}
				<span class="clear"></span>
				{{ Form::label('hex_3', 'Hex', array('style' => 'width: 50px;')); }}
				{{ Form::text('hex_3', Input::old('hex_3'), array('style' => 'width: 150px;')) }}
			</div>
			<span class="clear">
			</span>
			{{ Form::submit('Add Product'); }}
			{{ Form::close() }}
		</div>
		
	</div>
</div>