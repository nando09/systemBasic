	<script type="text/javascript">
		$(document).ready(function(){
			$(".search-primary").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$(".search-produto *").filter(function() {
					$(this.closest(".search-produto")).toggle($(this.closest(".search-produto")).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
</body>
</html>
