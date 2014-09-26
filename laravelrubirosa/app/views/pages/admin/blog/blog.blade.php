<div class="c_12">
	<div class="g_12">
		<h1>
			Blog
		</h1>
		
		<div class="admin_tools_header">
			<a class="add_button" href="javascript:void(0)" id="show_new_blog">
				+ New Blog
			</a>
		</div>
		
		<div class="list_legend_blog"> 
			<ul>
			
				<li class="date_blog">
					Date
				</li>
				<li class="title_blog">
					Title
				</li> 
				<li class="command">
					Command
				</li>
			</ul> 
		</div>

		<div class="admin_blog_list">
			<ul class='blog_list'>
				@if($blogs != NULL)
					@foreach ($blogs as $blog)
						<li>
							<div class="date_blog">
								{{$blog->created_time}}
							</div>
							<div class="title_blog">
								{{$blog->title}}
							</div>
							<div class="command">
								<a href="javascript:void(0)" class='edit_trigger'>[edit]</a>
								<input type='hidden' value='{{$blog->id}}' />
								<a href="javascript:void(0)" class="delete_trigger">[delete]</a> 
							</div>
						</li>
					@endforeach
				@else
					<li>
							<div class="date_blog">
								-
							</div>
							<div class="title_blog">
								-
							</div>
							<div class="command">
								-
							</div>
						</li>
				@endif
				<!--<li>
					<div class="date_blog">
						2014 10 12
					</div>
					<div class="title_blog">
						The Epic Title is Here
					</div>
					<div class="command">
						<a href="javascript:void(0)">[edit]</a>
						<a href="javascript:void(0)" class="delete_trigger">[delete]</a> 
					</div>
				</li>
				<li>
					<div class="date_blog">
						2014 10 16
					</div>
					<div class="title_blog">
						The Epic Title is Here
					</div>
					<div class="command">
						<a href="javascript:void(0)">[edit]</a>
						<a href="javascript:void(0)" class="delete_trigger">[delete]</a> 
					</div>
				</li>
				<li>
					<div class="date_blog">
						2014 10 17
					</div>
					<div class="title_blog">
						The Epic Title is Here
					</div>
					<div class="command">
						<a href="javascript:void(0)">[edit]</a>
						<a href="javascript:void(0)" class="delete_trigger">[delete]</a> 
					</div>
				</li>
				<li>
					<div class="date_blog">
						2014 10 19
					</div>
					<div class="title_blog">
						The Epic Title is Here
					</div>
					<div class="command">
						<a href="javascript:void(0)">[edit]</a>
						<a href="javascript:void(0)" class="delete_trigger">[delete]</a> 
					</div>
				</li>-->
			</ul>
		</div>

	</div>
</div>


<!-- POP UP Khusus DELETE -->
<div id="" class="delete_warning_pop" style="z-index:99999; display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
	<div class="tableed">
		<div class="celled pu_cell" style="">
			<div class="c_12">
				<div class="g_6 push_3" style="background: #fff; padding-top: 30px; padding-bottom: 30px;">
						<p style="width: 100%; text-align: center; font-size: 20px;">
							Are you sure want to delete this thread
						</p>
						<span class="clear"></span>
						<a href="javascript:void(0)" id='ok_delete' style="padding: 20px 30px 0px 30px; font-size: 20px; display: inline-block;">
							[Yes]
						</a>
						<input type='hidden' id='deleted_id' value='' />
						<a href="javascript:void(0)" class="close"  style="padding: 20px 30px 0px 30px; font-size: 20px; display: inline-block;">
							[No]
						</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click','.edit_trigger',function(){
		$id = $(this).next().val();
		$('.admin_control_panel').load('admingate/vieweditblog/'+$id);
	});
</script>

<!-- JS Khusus DELETE -->
<script type="text/javascript">
	$('body').on('click','#ok_delete',function(){
		$.ajax({
			type: 'DELETE',
			url: 'admingate/delete_blog',
			data: {
				"id_blog": $(this).next().val()
			},
			success: function(response){
				get_blog();
				$('.close').click();
				//alert(response);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	});
	
	function get_blog(){
		$.get( "admingate/bloglist", function( data ) {
			var list="";
			$(data).each(function() {
				list+="<li>";
				list+="<div class='date_blog'>";
				list+=$(this)[0].created_time;
				list+="</div>";
				list+="<div class='title_blog'>";
				list+=$(this)[0].title;
				list+="</div>";
				list+="<div class='command'>";
				list+="<a href='javascript:void(0)' class='edit_trigger'>[edit]</a>";
				list+="<input type='hidden' value='"+$(this)[0].id+"' />";
				list+="<a href='javascript:void(0)' class='delete_trigger'>[delete]</a>"; 
				list+="</div>";
				list+="</li>";
			});
			$('.blog_list').html(list);
			
		});
	}
	
	$(document).ready(function() {
		$(".delete_trigger").click(function() {
			$('#deleted_id').val($(this).prev().val());
			$(".delete_warning_pop").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
			$("body").css('overflow-x','hidden');
		});
	});
	
	/*external container area exit trigger*/
	$('.close').click(function(){
		$( ".delete_warning_pop" ).fadeOut( 200, function(){});
		$("body").css('overflow-x','visible');
	});
	$('.delete_warning_pop').click(function (e)
		{
			var container = $('.pu_cell');

			if (container.is(e.target) )// if the target of the click is the container...
			{
				$( ".delete_warning_pop" ).fadeOut( 200, function(){});
				$("body").css('overflow-x','visible');
			}
		});
		Slider = $('#slider').Swipe({  
			auto: 3000,  
			continuous: true  
		}).data('Swipe');  
	$('.delete_warning_pop').css('display','none');
</script>
