<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Admin</title>

		<!--Identity-->
	
	
		<!-- Style -->
		<link href="{{ asset('assets/css/all.css') }}" rel="stylesheet"><!-- {{ asset('assets/css/all.css') }} -->
		<link href="{{ asset('assets/js/datepicker/css/datepicker.css') }}" rel="stylesheet">
		<!--<link rel="icon" type="image/png" href="assets/img/favicon.png">--> <!-- {{ asset('assets/img/favicon.png') }} -->
		<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
		<script src="{{ asset('assets/js/mbf.js') }}"></script>
		<script src="{{ asset('assets/js/datepicker/js/bootstrap-datepicker.js') }}"></script>
	</head>
	<body>
		<section class="header_admin">
			<div class="admin_logo">
				<span class="logo_admin"></span>
			dsaf
			</div>
			<div class="admin_id">
				<a href="javascript:void(0)">
					Logout
				</a>
			</div>
		</section>
		<section class="admin_content_container">
			<nav class="sidebar_admin">
				<ul>
					<li>
						<a href="javascript:void(0)" id="admin_category_trigger">Category</a>
					</li>
					<li>
						<a href="javascript:void(0)" id="admin_product_trigger">Product</a>
					</li>
					<li>
						<a href="javascript:void(0)" id="admin_cleaningtips_trigger">Cleaning Tips</a>
					</li>
					<li>
						<a href="javascript::void(0)" id="admin_blog_trigger">Blog</a>
					</li>
					<li>
						<a href="javascript:void(0)" id="admin_contact_trigger">Contact</a>
					</li>
				</ul>
			</nav>	
			<div class="admin_control_panel">
				dsfsfsdfsdf
			</div>		
		</section>

	
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