/*
Easy navigation anchor scrolling.
Work wonders with:
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
*/

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	  var target = $(this.hash);
	  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	  if (target.length) { 
		$('html,body').animate({
		  scrollTop: target.offset().top - 88
		},1000, 'easeInOutExpo');
		return false;
	  }
	}
  });
});