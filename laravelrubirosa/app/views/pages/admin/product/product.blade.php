<div class="c_12">
	<div class="g_12">
		<h1>
			Product
		</h1>
		
		<div class="admin_tools_header">
			<a class="add_button" href="javascript:void(0)" id="show_new_product">
				+ New Product
			</a>
		</div>
		
		<div class="list_legend_product"> 
			<ul>
			
				<li class="name_prod">
					Name Product
				</li>
				<li class="name_mcat">
					Gender
				</li> 
				
				<li class="name_cat">
					Name Cat.
				</li> 
				<li class="command">
					Command
				</li>
			</ul> 
		</div>

		<div class="admin_product_list">
			<ul class='product_list'>
				@if($products!=null)
					@foreach($products as $product)
					<li>
						<div class="name_prod">
							{{$product->name}}
						</div>
						<div class="name_mcat">
							@if(Category::find($product->id_category)->gender == 0)
								Man
							@elseif(Category::find($product->id_category)->gender == 1)
								Woman
							@else
								Unisex
							@endif
						</div>
						
						<div class="name_cat">
							{{Category::find($product->id_category)->name}}
						</div>
						<div>
							<a href="javascript:void(0)" class='edit_trigger'>[edit]</a>
							<input type='hidden' value='{{$product->id}}' />
							<a href="javascript:void(0)" class="delete_trigger">[delete]</a> 
						</div>
					</li>
					@endforeach
				@else
					<li>
						<div class="name_prod">
							-
						</div>
						<div class="name_mcat">
							-
						</div>
						
						<div class="name_cat">
							-
						</div>
						<div>
							-
						</div>
					</li>
				@endif
				

				<!--<li>
				
					<div class="name_prod">
						The Classic Bifold
					</div>
					<div class="name_mcat">
						Men
					</div>
					
					<div class="name_cat">
						Wallet
					</div>
					<div>
						<a href="javascript:void(0)">[edit]</a>
						<a href="javascript:void(0)" class="delete_trigger">[delete]</a> 
					</div>
				</li>

				<li>
					
					<div class="name_prod">
						Smart Sleeve
					</div>
					<div class="name_mcat">
						Men
					</div>
				
					<div class="name_cat">
						Sleeve
					</div>
					<div>
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
							Are you sure want to delete this product
						</p>
						<span class="clear"></span>
						<a href="javascript:void(0)" id='ok_delete' style="padding: 20px 30px 0px 30px; font-size: 20px; display: inline-block;">
							[Yes]
						</a>
						<input type='hidden' id='deleted_id' />
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
		$('.admin_control_panel').load('admingate/view_edit_product/'+$id);
	});
</script>
<!-- JS Khusus DELETE -->
<script type="text/javascript">
	$(document).ready(function() {
		$('body').on('click',".delete_trigger",function() {
			$(".delete_warning_pop").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
			$("body").css('overflow-x','hidden');
			$('#deleted_id').val($(this).prev().val());
		});
	});
	
	$('body').on('click','#ok_delete',function(){
		$.ajax({
			type: 'DELETE',
			url: 'admingate/delete_product',
			data: {
				"id_product": $(this).next().val()
			},
			success: function(response){
				//get_product();
				//$('.close').click();
				//alert(response);
				location.reload();
				$('#admin_product_trigger').click();
				alert('Success to delete product');
			},
			error: function(jqXHR, textStatus, errorThrown){
				$('#admin_product_trigger').click();
				alert('Failed to delete product');
			}
		},'json');
	});
	
	function get_product(){
		$.get( "admingate/list_product", function( data ) {
			var list="";
			if(data){
				$(data).each(function() {
					list+="<li>";
					list+="<div class='name_prod'>";
					list+=$(this)[0].name;
					list+="</div>";
					list+="<div class='name_mcat'>";
					list+=$(this)[0].id_category;
					list+="</div>";
					list+="<div class='name_cat'>";
					list+=$(this)[0].id_category;
					list+="</div>";
					list+="<div>";
					list+="<a href='javascript:void(0)'>[edit]</a>";
					list+="<input type='hidden' value='"+$(this)[0].id+"' />";
					list+="<a href='javascript:void(0)' class='delete_trigger'>[delete]</a>"; 
					list+="</div>";
					list+="</li>";
				});
				$('.product_list').html(list);
			}
		});
	}
	
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
