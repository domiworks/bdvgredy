<!doctype html>
<html>
<head>
	@include('includes.head_admin')
</head>
<body>
	<section class="header_admin">
		<div class="admin_logo">
			<span class="logo_admin"></span>
			<img src="{{asset('assets/img/bpjs_white.png')}}" height="50" style="margin-left: 20px;">
			<h3 style="color: #fff; margin-left:20px; display: inline-block">
				Hey, dokter {{Dokter::find(1)->nama}}
			</h3>
		</div>
		<div class="admin_id">
			<a href="javascript:void(0)">
				Logout
			</a>
		</div>
    </section>
	<section class="admin_content_container">
		{{-- @include('includes.sidebar_admin') --}}
		<!-- <div class="admin_control_panel"> -->
		
			@yield('content')
		
		<!-- </div> -->		
	</section>

	
	<script src="{{ asset('/assets/js/admin/admin.js') }}"></script>
    <script type="text/javascript">
		$('body').css('overflow','hidden');
		
		function updateSize(){
		
			var height = $(window).height() - $('.header_admin').height();
			var width = $(window).width() - $('.admin_logo').width();
			$('.admin_content_container, .sidebar_admin, .admin_control_panel').css('height',height);
			$('.admin_control_panel, .admin_id').css('width',width);
		
			
		};
		$(document).ready(updateSize);
		$(window).resize(updateSize);
	</script>
</body>
</html>