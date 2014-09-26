<div class="c_12">
	<div class="g_12">
		<h1>
			Edit Category
		</h1>
		
		<div class="admin_tools_header">
			<!--<a class="back_to_category" id="admin_category_trigger" href="javascript:void(0)" >
				back to category
			</a>-->
			
			
		</div>
		
		<div class="add_new_stuff_form">
		{{ Form::open(array('url' => 'admingate/edit_category','method' => 'put','files'=>'true')) }}
			<div class="row">
				@if($category->gender==0)
					{{Form::label('gender', 'Gender')}}
					{{Form::radio('gender','0',true,array('class' => 'awesome'))}} Men    
					{{Form::radio('gender','1')}}Women
					{{Form::radio('gender','2')}}Unisex
				@elseif($category->gender==1)
					{{Form::label('gender', 'Gender')}}
					{{Form::radio('gender','0',array('class' => 'awesome'))}} Men    
					{{Form::radio('gender','1',true)}}Women
					{{Form::radio('gender','2')}}Unisex
				@else
					{{Form::label('gender', 'Gender')}}
					{{Form::radio('gender','0',array('class' => 'awesome'))}} Men    
					{{Form::radio('gender','1')}}Women
					{{Form::radio('gender','2',true)}}Unisex
				
				@endif
			</div>
			
			
			<div class="row">
				{{ Form::label('cat_title', 'Category Name'); }}
				{{ Form::text('cat_title',$category->name, Input::old('cat_title')) }}
			</div>
			
			<div class="row">
				<img src="{{$category->desktop_thumbnail}}" id='desktop_thumb' alt="" width="200"/>
				{{ Form::label('desktop_thumbnail', 'Desktop Thumbnail'); }}
				{{ Form::file('desktop_thumbnail'); }}
				<input type='hidden' name='desktop_change' value='false'/>
			</div>
			<div class="row">
				<img src="{{$category->phone_thumbnail}}" id='phone_thumb' alt="" width="200"/>
				{{ Form::label('phone_thumbnail', 'Phone Thumbnail'); }}
				{{ Form::file('phone_thumbnail'); }}
				<input type='hidden' name='phone_change' value='false'/>
			</div>
			<input type='hidden' name='id_category' value='{{$category->id}}'>
			{{ Form::submit('Edit Category'); }}
		{{ Form::close() }}
		</div>
		
	</div>
</div>

<script>
	$('body').on('change','#desktop_thumbnail',function(){
		$(this).next().val(true);
		var i = 0, len = this.files.length, img, reader, file;
			for ( ; i < len; i++ ) {
				file = this.files[i];
				if (!!file.type.match(/image.*/)) {
					if ( window.FileReader ) {
						reader = new FileReader();
						reader.onloadend = function (e) { 
							$('#desktop_thumb').attr('src',e.target.result);
						};
						reader.readAsDataURL(file);
					}
				}
			}
	});
	
	$('body').on('change','#phone_thumbnail',function(){
		$(this).next().val(true);
		var i = 0, len = this.files.length, img, reader, file;
			for ( ; i < len; i++ ) {
				file = this.files[i];
				if (!!file.type.match(/image.*/)) {
					if ( window.FileReader ) {
						reader = new FileReader();
						reader.onloadend = function (e) { 
							$('#phone_thumb').attr('src',e.target.result);
						};
						reader.readAsDataURL(file);
					}
				}
			}
	});
</script>