				</div>
			</div>
		</div>
	</div>
	<footer id="footer" class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title">Planos</h5>
							<p class="card-text">Conheças todos os planos que temos para melhor rendimento de sua empresa. Você tambem pode dar dicas de evolução também.</p>
							<a href="http://fernandobatista.com.br/" target="_blank" class="btn btn-primary">Click aqui!</a>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title">O que você quer no sistema?</h5>
							<p class="card-text">Fale o que você quer que o sistema faça para você, entre em contato e vamos deixar o sistema do jeito que sua empresa precisa.</p>
							<a href="#" class="btn btn-primary">Aqui!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".search-primary").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$(".table .tbody-primary tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
</body>
</html>
