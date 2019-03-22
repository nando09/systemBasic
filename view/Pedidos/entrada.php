<?php include 'view/patterns/header.php' ?>
<div>
	<h1 class="title-pag">Entrada de produtos</h1>
	<div data-backdrop="static" class="modal fade bd-example-modal-xl detalhamento" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="container">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1 class="title-pag">Detalhe do pedido</h1>
					<div id="detalhamento">
						<div class="row">
							<div class="col-md-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col text-uppercase">Empresa</th>
											<th scope="col text-uppercase">Valor</th>
											<th scope="col text-uppercase">Ultima</th>
											<th scope="col text-uppercase">Vencimento</th>
											<th scope="col text-uppercase">Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="empresa">Mark</td>
											<td class="valor">Mark</td>
											<td class="ultima">Mark</td>
											<td class="vencimento">Mark</td>
											<td class="status">@mdo</td>
										</tr>
									</tbody>
								</table>
							</div>

							<!-- Para a class row nao alinha tudo -->
							<div class="col-md-12">
								<hr class="my-4">
							</div>

							<div class="col-md-6">
								<h2 class="title-model text-center">Produtos</h2>
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Nome</th>
											<th scope="col">Valor produto</th>
											<th scope="col">Quantidade</th>
											<th scope="col">Valor total</th>
										</tr>
									</thead>
									<tbody id="produtos-detalhes">
									</tbody>
								</table>
								<!-- <canvas id="myChart"></canvas> -->
							</div>
							<div class="col-md-6">
								<h2 class="title-model text-center">Anotações</h2>
								<table class="table">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">First</th>
											<th scope="col">Last</th>
											<th scope="col">Handle</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">EMPRESA</th>
				<th scope="col">DEVENDO</th>
				<th scope="col">STATUS</th>
				<th class="text-center" scope="col">DETALHAMENTO</th>
				<th class="text-center" scope="col">EDITAR</th>
			</tr>
		</thead>
		<tbody id="pedidos-entrada" class="tbody-primary">
		</tbody>
	</table>
</div>
<script src="/System/systemBasic/js/pedidos-entrada.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>