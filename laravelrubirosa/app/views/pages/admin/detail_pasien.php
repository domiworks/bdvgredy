@extends('layouts.adminlayout')
@section('content')


<div class="container">
	<div class="row">
		<div class="g-lg-12">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Data Pasien</h3>
				</div>
				<div class="panel-body">
					
			
						
					<form class="form-horizontal" role="form">
					
						<img src="" alt="" class="img-thumbnail" width="300">
						
						<span class="clear-fix"></span>
						
						<div class="form-group">
							<label class="g-sm-3 control-label">Nama Pasien</label>
							<div class="g-sm-6">
								<!-- <input type="text" class="form-control"> -->
								Muhammad Naufal Ashidiq Wangsaatmadja 
							</div>
							<div class="g-sm-3">
								<span class="btn btn-danger">
									Warning ini gak usah dibuat gred
								</span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="g-sm-3 control-label">Nomer BPJS</label>
							<div class="g-sm-6">
								<!-- <input type="text" class="form-control"> -->
									45678 45678 567
							</div>
							<div class="g-sm-3">
								<span class="btn btn-danger">
									Warning ini gak usah dibuat gred
								</span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="g-sm-3 control-label">Daftar ALergi</label>
							<div class="g-sm-6">
								<!-- <input type="text" class="form-control"> -->
								<ul>
									<li>Alergi Kucing</li>
									<li>Alergi Debu</li>
									<li>Alergi Makanan Laut</li>
								</ul>
							</div>
							<div class="g-sm-3">
								<span class="btn btn-danger">
									Warning ini gak usah dibuat gred
								</span>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="inputPassword3" class="g-sm-3 control-label">Visibility *</label>
							<div class="g-sm-6">
								<select class="form-control">
									<option value="one">Catalog</option>
									<option value="two">Search</option>
									<option value="two">Catalog, Search</option>
								</select>
							</div>
							<div class="g-sm-3">
								<span class="btn btn-danger">
									Maaf form harus diisi
								</span>
							</div>
						</div>
						
						<div class="form-group">
							<div class=" g-sm-3 g-sm-push-3">
								<button type="submit" class="btn btn-warning">Lanjutkan</button>
							</div>
						</div>
					</form>		
			
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