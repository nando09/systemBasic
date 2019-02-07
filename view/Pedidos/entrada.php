<?php include 'view/patterns/header.php' ?>
<div>
	<h1 class="title-pag">Entrada de produtos</h1>
	<div data-backdrop="static" class="modal fade bd-example-modal-xl detalhamento" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div id="detalhamento" class="modal-content">
				<div class="container">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1 class="title-pag">Detalhe do pedido</h1>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col text-uppercase">empresa</th>
										<th scope="col text-uppercase">valor</th>
										<th scope="col text-uppercase">ultima</th>
										<th scope="col text-uppercase">vencimento</th>
										<th scope="col text-uppercase">tempo</th>
										<th scope="col text-uppercase">status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="empresa">Mark</td>
										<td class="valor">Mark</td>
										<td class="ultima">Mark</td>
										<td class="vencimento">Mark</td>
										<td class="tempo">Otto</td>
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
							<h2 class="title-model text-center">Pedido</h2>
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
									<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>Larry</td>
										<td>the Bird</td>
										<td>@twitter</td>
									</tr>
								</tbody>
							</table>
							<!-- <canvas id="myChart"></canvas> -->
						</div>
						<div class="col-md-6">
							<h2 class="title-model text-center">Produtos já comprado</h2>
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
									<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>Larry</td>
										<td>the Bird</td>
										<td>@twitter</td>
									</tr>
								</tbody>
							</table>
							<!-- <canvas id="myChart"></canvas> -->
						</div>

						<!-- Para a class row nao alinha tudo -->
						<div class="col-md-12">
							<hr class="my-4">
						</div>

						<div class="col-md-6">
							<h2 class="title-model text-center">Datas das compras</h2>
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
									<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>Larry</td>
										<td>the Bird</td>
										<td>@twitter</td>
									</tr>
								</tbody>
							</table>
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
									<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>Larry</td>
										<td>the Bird</td>
										<td>@twitter</td>
									</tr>
								</tbody>
							</table>
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
		<tbody id="pedidos-entrada">
		</tbody>
	</table>
</div>
<script src="/System/systemBasic/js/pedidos-saida.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>