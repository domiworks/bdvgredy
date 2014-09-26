<script>
@if(Session::get('message')=='Success')
	alert('Success');
@elseif(Session::get('message')=='Success')
	alert('Failed');
@else

@endif

</script>

<div class="c_12">

	<div class="g_12">
		<h1>
			Category
		</h1>
		
		<div class="admin_tools_header">
			<a class="add_button" href="javascript:void(0)" id="show_new_category">
				+ New Category
			</a>
		</div>
		
		<div class="list_legend_cat">
			<ul>
			
				<li>
					Name Category
				</li>
				
				<li>
					Name Gender
				</li>
				<li style="width: 222px;">
					Command
				</li>
			</ul>
		</div>
		
		<div class="admin_category_list">
			<ul class='category_list'>
				@if($categories != NULL)
					@foreach ($categories as $category)
						<li>
							<div class="name_cat">
								{{$category->name}}
							</div>
							
							<div class="name_parent">
								@if($category->gender == 0)
									Man
								@elseif($category->gender == 1)
									Woman
								@else
									Unisex
								@endif
							</div>
							<div class="command">
								<a href="javascript:void(0)" class='edit_trigger'>[edit]</a>
								<input type='hidden' value='{{$category->id}}' />
								<a href="javascript:void(0)" class="delete_trigger">[delete]</a> 
							</div>
						</li>
					@endforeach
				@else
					<li>
							<div class="name_cat">
								-
							</div>
							
							<div class="name_parent">
								-
							</div>
							<div class="command">
								-
							</div>
						</li>
				@endif
				<!--<li>
					<div class="name_cat">
						Belt
					</div>
					
					<div class="name_parent">
						Men
					</div>
					<div class="command">
						<a href="javascript:void(0)">e</a>
						<a href="javascript:void(0)">d</a> 
					</div>
				</li>
				<li>
				
					<div class="name_cat">
						Bracelet
					</div>
					
					<div class="name_parent">
						Men
					</div>
					<div class="command">
						<a href="javascript:void(0)">e</a>
						<a href="javascript:void(0)">d</a> 
					</div>
				</li>
				<li>
					
					<div class="name_cat">
						Sleeve
					</div>
					
					<div class="name_parent">
						Men
					</div>
					<div class="command">
						<a href="javascript:void(0)">e</a>
						<a href="javascript:void(0)">d</a> 
					</div>
				</li>
				<li>
				
					<div class="name_cat">
						Belt
					</div>
				
					<div class="name_parent">
						Women
					</div>
					<div class="command">
						<a href="javascript:void(0)">e</a>
						<a href="javascript:void(0)">d</a> 
					</div>
				</li>
				<li>
				
					<div class="name_cat">
						Wallet
					</div>
					
					<div class="name_parent">
						Women
					</div>
					<div class="command">
						<a href="javascript:void(0)">e</a>
						<a href="javascript:void(0)">d</a> 
					</div>
				</li>
				<li>
					
					<div class="name_cat">
						Bracelet
					</div>
					
					<div class="name_parent">
						Unisex
					</div>
					<div class="command">
						<a href="javascript:void(0)">e</a>
						<a href="javascript:void(0)">d</a> 
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
							Are you sure want to delete this category
						</p>
						<span class="clear"></span>
						<a href="javascript:void(0)" id='ok_delete' style="padding: 20px 30px 0px 30px; font-size: 20px; display: inline-block;">
							[Yes]
						</a>
						<input type='hidden' id='id_will_be_deleted'value='' />
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
		$('.admin_control_panel').load('admingate/view_edit_category/'+$id);
	});
</script>
<!-- JS Khusus DELETE -->
<script type="text/javascript">
	$(document).ready(function() {
		$("body").on('click','.delete_trigger',function() {
			$(".delete_warning_pop").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
			$("body").css('overflow-x','hidden');
			$('#id_will_be_deleted').val($(this).prev().val());
		});
	});
	
	$('body').on('click','#ok_delete',function(){
		$.ajax({
			type: 'DELETE',
			url: 'admingate/delete_category',
			data: {
				"id_category": $(this).next().val()
			},
			success: function(response){
				get_category();
				$('.close').click();
				//alert(response);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	});
	
	function get_category(){
		$.get( "admingate/listcategory", function( data ) {
			var list="";
			$(data).each(function() {
				list+="<li>";
				list+="<div class=name_cat>";
				list+=$(this)[0].name;
				list+="</div>";
				list+="<div class='name_parent'>";
				if($(this)[0].gender == 0){
					list+="Man";
				}
				else if($(this)[0].gender == 1){
					list+="Woman";
				}
				else{
					list+="Unisex";
				}
				list+="</div>";
				list+="<div class='command'>";
				list+="<a href='javascript:void(0)'>[edit]</a>";
				list+="<input type='hidden' value='"+$(this)[0].id+"' />";
				list+="<a href='javascript:void(0)' class='delete_trigger'>[delete]</a>";
				list+="</div>";
				list+="</li>";
			});
			$('.category_list').html(list);
			
		});
	}
	
	/*external container area exit trigger*/
	$('body').on('click','.close',function(){
		$( ".delete_warning_pop" ).fadeOut( 200, function(){});
		$("body").css('overflow-x','visible');
	});
	$('body').on('click','.delete_warning_pop',function (e)
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

