@if (Agent::isMobile() == false) {{-- if desktop only --}}
	<meta name="viewport" content="width=1140px, user-scalable=no"/>
	<link rel="stylesheet" href="{{asset('/assets/css/all.css')}}" />
@elseif (Agent::isTablet() == true) {{-- if tablet only --}}
	<meta name="viewport" content="width=1140px, user-scalable=yes"/>
	<link rel="stylesheet" href="{{asset('/assets/css/all.css')}}" />
@elseif ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
	<meta name="viewport" content="width=640, user-scalable=no, target-densityDpi=high-dpi, maximum-scale=0.5, minimum-scale=0.5"/>
	<link rel="stylesheet" href="{{asset('/assets/css/all_mob.css')}}" />   
@endif

	<!--<link href="assets/css/all.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">-->
	
	<script type="text/javascript" src="{{ asset('/assets/js/jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
	<!--<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
	<!--<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src='assets/js/text_editor/jquery-te-1.4.0.min.js'></script>-->

