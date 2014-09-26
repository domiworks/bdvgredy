@extends('layouts.adminlayout')
@section('content')


<div class="container">
	<div class="row">
		<div class="g-lg-12">
			
			<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">General</h3>
								</div>
								<div class="panel-body">
								
									<div class="g-lg-12">
			
			<table class="table table-striped table-hover ">
									<thead>
										<tr>
											<th>Nama Pasien</th>
											<th>No Pasien</th>
											<!--<th>Tipe</th>
											<th>Attribute Set</th>-->
											<th>View Detail</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										for ($i=0; $i<=30; $i++) {
										  ?>
										<tr class="pop_up_trigger">
										
											<!-- <td><input type="checkbox"></td> -->
											<td>Nama Orang ke-<?php echo($i); ?></td>
											<td>Nomer Pasien ke-<?php echo($i); ?></td>
											<!--<td>Pakaian</td>
											<td>Set atribut pakaian</td>-->
											<td><a href="" class="btn btn-warning">View Detail</a></td>
										</tr>
										  <?php
										} 
										?>
										
									</tbody>
								</table>
			
			
		</div>
		</div>
		</div>
		</div>
	</div>
	
</div>

	
<!--pop up -->
<!-- <div id="pu_product" class="pu_c" style="z-index: 999999; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; display: none; background: rgba(0, 0, 0, 0.701961);">
	<div class="tableed">
		<div class="celled pu_cell" style="">
			<div class="pu_product_cntnt" style="">
				dfgdfd
			</div>
		</div>
	</div>
</div>
<script>
	$('.pop_up_trigger').click(function(){
		$(".pu_c").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
	});
	
	$('.pu_close').click(function(){
		$( ".pu_c" ).fadeOut( 200, function(){});
		$("body").css('overflow-x','visible');
	});
	
	$('.pu_c').click(function (e)
		{
			var container = $('.pu_cell');

			if (container.is(e.target) )// if the target of the click is the container...
			{
				$( ".pu_c" ).fadeOut( 200, function(){});
				$("body").css('overflow-x','visible');
			}
		});
</script>
-->


@stop