<?php include 'view/patterns/header.php' ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="home-tab" data-toggle="tab" href="#lista" role="tab" aria-controls="home" aria-selected="true">Entrada</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="profile-tab" data-toggle="tab" href="#relatorio" role="tab" aria-controls="profile" aria-selected="false">Saída</a>
	</li>
</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="lista" role="tabpanel" aria-labelledby="home-tab">
		<div data-backdrop="static" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h1 class="title-pag">Novo pedido</h1>
						<div id="novo-elemento">
							<div class="row">
								<div class="form-group col-md-6">
									<label>Nome</label>
									<input id="nome" name="nome" type="text" class="form-control">
								</div>
								<div class="form-group col-md-6" id="cliente">
									<label>Cliente</label>
									<select id="cliente-novo" name="cliente" class="form-control"></select>
								</div>
								<div class="form-group col-md-4">
									<label>Valor</label>
									<input id="valor" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>Quantidade</label>
									<input id="quantidade" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>Quantidade Min.</label>
									<input id="min" name="valor" type="text" class="form-control" placeholder="Quantidade minima é para um alerta de estoque...">
								</div>
								<div class="form-group col-md-12">
									<label>Descrição</label>
									<textarea id="descricao" name="descricao" class="form-control" rows="3"></textarea>
								</div>
								<!-- <button id="salvar" class="btn btn-primary btn-adicionar"></button> -->
							</div>
							<button id="salvar-pedido" type="button" class="btn btn-primary" data-dismiss="modal">SALVAR</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div data-backdrop="static" class="modal fade bd-example-modal-xl editar" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h1 class="title-pag">Alterar pedido</h1>
						<div id="novo-elemento">
							<div class="row">
								<input id="id_pedido" name="id_pedido" type="hidden">
								<div class="form-group col-md-6">
									<label>Nome</label>
									<input id="nome-editar" name="nome" type="text" class="form-control">
								</div>
								<div class="form-group col-md-6" id="cliente">
									<label>Cliente</label>
									<select id="cliente-editar" name="cliente" class="form-control"></select>
								</div>
								<div class="form-group col-md-4">
									<label>Valor</label>
									<input id="valor-editar" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>Quantidade</label>
									<input id="quantidade-editar" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>Quantidade Min.</label>
									<input id="min-editar" name="valor" type="text" class="form-control" placeholder="Quantidade minima é para um alerta de estoque...">
								</div>
								<div class="form-group col-md-12">
									<label>Descrição</label>
									<textarea id="descricao-editar" name="descricao" class="form-control" rows="3"></textarea>
								</div>
								<!-- <button id="salvar" class="btn btn-primary btn-adicionar"></button> -->
							</div>
							<button id="alterar-pedido" type="button" class="btn btn-primary" data-dismiss="modal">ALTERAR</button>
						</div>
					</div>
				</div>
			</div>
		</div>

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
					<th scope="col">ULTIMA COMPRA</th>
					<th scope="col">STATUS</th>
					<th class="text-center" scope="col">DETALHAMENTO</th>
					<th class="text-center" scope="col">FAZER PEDIDO</th>
				</tr>
			</thead>
			<tbody id="pedidos">
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="relatorio" role="tabpanel" aria-labelledby="profile-tab">
		<div data-backdrop="static" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h1 class="title-pag">Novo pedido</h1>
						<div id="novo-elemento">
							<div class="row">
								<div class="form-group col-md-6">
									<label>Nome</label>
									<input id="nome" name="nome" type="text" class="form-control">
								</div>
								<div class="form-group col-md-6" id="cliente">
									<label>Cliente</label>
									<select id="cliente-novo" name="cliente" class="form-control"></select>
								</div>
								<div class="form-group col-md-4">
									<label>Valor</label>
									<input id="valor" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>Quantidade</label>
									<input id="quantidade" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>Quantidade Min.</label>
									<input id="min" name="valor" type="text" class="form-control" placeholder="Quantidade minima é para um alerta de estoque...">
								</div>
								<div class="form-group col-md-12">
									<label>Descrição</label>
									<textarea id="descricao" name="descricao" class="form-control" rows="3"></textarea>
								</div>
								<!-- <button id="salvar" class="btn btn-primary btn-adicionar"></button> -->
							</div>
							<button id="salvar-pedido" type="button" class="btn btn-primary" data-dismiss="modal">SALVAR</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div data-backdrop="static" class="modal fade bd-example-modal-xl editar" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h1 class="title-pag">Alterar pedido</h1>
						<div id="novo-elemento">
							<div class="row">
								<input id="id_pedido" name="id_pedido" type="hidden">
								<div class="form-group col-md-6">
									<label>Nome</label>
									<input id="nome-editar" name="nome" type="text" class="form-control">
								</div>
								<div class="form-group col-md-6" id="cliente">
									<label>Cliente</label>
									<select id="cliente-editar" name="cliente" class="form-control"></select>
								</div>
								<div class="form-group col-md-4">
									<label>Valor</label>
									<input id="valor-editar" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>Quantidade</label>
									<input id="quantidade-editar" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>Quantidade Min.</label>
									<input id="min-editar" name="valor" type="text" class="form-control" placeholder="Quantidade minima é para um alerta de estoque...">
								</div>
								<div class="form-group col-md-12">
									<label>Descrição</label>
									<textarea id="descricao-editar" name="descricao" class="form-control" rows="3"></textarea>
								</div>
								<!-- <button id="salvar" class="btn btn-primary btn-adicionar"></button> -->
							</div>
							<button id="alterar-pedido" type="button" class="btn btn-primary" data-dismiss="modal">ALTERAR</button>
						</div>
					</div>
				</div>
			</div>
		</div>

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
					<th scope="col">ULTIMA COMPRA</th>
					<th scope="col">STATUS</th>
					<th class="text-center" scope="col">DETALHAMENTO</th>
					<th class="text-center" scope="col">FAZER PEDIDO</th>
				</tr>
			</thead>
			<tbody id="pedidos">
			</tbody>
		</table>
	</div>
</div>
<script src="/System/systemBasic/js/pedidos-entrada.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>