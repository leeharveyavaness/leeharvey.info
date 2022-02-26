<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../js/main.js"></script>
<script>
	$(document).ready(function(){
		$('.sidenav').sidenav();
		$(".dropdown-trigger").dropdown();
	});
</script>

<script>
	$(function() {
		$('.fixed-action-btn').click(function() {
			$("html, body").animate({
				scrollTop:0
			},1000);
		})
	})

	$(window).scroll(function() {
		if ($(this).scrollTop()>200) {
			$('.fixed-action-btn').fadeIn();
		} else {
			$('.fixed-action-btn').fadeOut();
		}
	});
</script>