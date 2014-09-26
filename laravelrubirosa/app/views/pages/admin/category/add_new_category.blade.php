<div class="c_12">
	<div class="g_12">
		<h1>
			Add New Category
		</h1>
		
		<div class="admin_tools_header">
			<!--<a class="back_to_category" id="admin_category_trigger" href="javascript:void(0)" >
				back to category
			</a>-->
			
			
		</div>
		
		<div class="add_new_stuff_form">
		{{ Form::open(array('url' => 'admingate/add_category','method' => 'post','files'=>'true')) }}
			<div class="row">
				{{ Form::label('gender', 'Gender'); }}
				{{ Form::radio('gender','0',array('class' => 'awesome')) }}Men    
				{{ Form::radio('gender','1') }}Women
				{{ Form::radio('gender','2') }}Unisex
			</div>
			
			
			<div class="row">
				{{ Form::label('cat_title', 'Category Name'); }}
				{{ Form::text('cat_title', Input::old('cat_title')) }}
			</div>
			
			<div class="row">
				{{ Form::label('desktop_thumbnail', 'Desktop Thumbnail'); }}
				{{ Form::file('desktop_thumbnail'); }}
			</div>
			<div class="row">
				{{ Form::label('phone_thumbnail', 'Phone Thumbnail'); }}
				{{ Form::file('phone_thumbnail'); }}
			</div>
			{{ Form::submit('Add Category'); }}
		{{ Form::close() }}
		</div>
		
	</div>
</div>