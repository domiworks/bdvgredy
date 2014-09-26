<div class="c_12">
	<div class="g_12">
		<h1>
			Edit Blog
		</h1>
		
		<div class="admin_tools_header">
			<a class="back_to_category" id="admin_blog_trigger" href="javascript:void(0)" >
				back to blog
			</a>
		</div>
		
		<div class="add_new_stuff_form">
		{{ Form::open(array('url' => 'admingate/edit_blog','method'=>'put','files'=>'true')) }}
			<div class="row">
				{{ Form::label('blog_title', 'Blog Title'); }}
				{{ Form::text('blog_title',$blog->title, Input::old('blog_title')) }}
			</div>
			
			<div class="row">
				{{ Form::label('blog_content', 'Blog Content'); }}
				<textarea name="blog_content" class="blog_content_textarea">{{$blog->content}}</textarea>
				<script>
					$('.blog_content_textarea').jqte();
				</script>
			</div>
			<div class="row">
				<img src="{{$blog->photo}}" alt="" width="200"/>
				{{ Form::label('blog_cover_img', 'Blog Cover Image (Opt.)'); }}
				{{ Form::file('blog_cover_img'); }}
			</div>
			<input type='hidden' name='id_edit' value='{{$blog->id}}' />
			{{ Form::submit('Edit Blog'); }}
		{{ Form::close() }}
		</div>

	</div>
</div>