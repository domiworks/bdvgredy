<div class="c_12">
	<div class="g_12">
		<h1>
			Cleaning Tips
		</h1>
		
		<div>
		{{ Form::open(array('url' => 'admingate/edit_cleaningtips','method'=>'put')) }}
			<textarea name="edit_content" class="cleaning_tips_textarea">@if($cleaning->content != NULL) {{$cleaning->content}} @else - @endif</textarea>
			{{ Form::submit('Update Cleaning Tips'); }}
		{{ Form::close() }}
			
		</div>
	<script>
		$('.cleaning_tips_textarea').jqte();

	</script>
	</div>
</div>