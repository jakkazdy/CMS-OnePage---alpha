	<footer class="footer">
			<div class="container">
				<p> PracowniaMZ.pl - CMS Onepage by WEB_space - <a href="index.php?a=admin">Panel administratora</a></p>
			</div>
		</footer>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/stickyfill.js"></script>
	<script>
	$('.nav').Stickyfill();

	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top -70
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	</script>
</body>
</html>