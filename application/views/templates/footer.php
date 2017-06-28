		<footer class="footer">
			<hr />
			<div class="container">
				<p class="text-center">&copy; 2017. kkkchua<br />Test Assignment</p>
			</div>
		</footer>
	</body>
	<script src="<?php echo base_url(); ?>libs/jquery/3.2.0/jquery-3.2.0.min.js"></script>
	<script src="<?php echo base_url(); ?>libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {
			$(window).scroll(function () {
				if ($(window).scrollTop() == ( $(document).height() - $(window).height())) {
					Home.loadData();
				}
			});
		});
	</script>
</html>