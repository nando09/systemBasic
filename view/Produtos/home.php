<?php include 'view/patterns/header.php' ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="home-tab" data-toggle="tab" href="#lista" role="tab" aria-controls="home" aria-selected="true">Listagem</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="profile-tab" data-toggle="tab" href="#relatorio" role="tab" aria-controls="profile" aria-selected="false">Relatorio</a>
	</li>
</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="lista" role="tabpanel" aria-labelledby="home-tab">
		<h1 class="title-pag">Listagem dos produtos</h1>
		<!-- <a href="/System/systemBasic/Produtos/novo" class="btn btn-primary">NOVO</a> -->
		<!-- Extra large modal -->
		<button type="button" class="btn btn-primary btn-adicionar" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>
		<div data-backdrop="static" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h2 class="title-pag">Novo Produto</h2>
						<div id="novo-elemento">
							<div class="row">
								<div class="form-group col-md-6">
									<label>Nome</label>
									<input id="nome" name="nome" type="text" class="form-control">
								</div>
								<div class="form-group col-md-6" id="categoria">
									<label>Categoria</label>
									<select id="categoria-novo" name="categoria" class="form-control"></select>
								</div>
								<div class="form-group col-md-3">
									<label>Codigo interno</label>
									<input id="nro" name="nro" type="text" class="form-control">
								</div>
								<div class="form-group col-md-3">
									<label>Valor</label>
									<input id="valor" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-3">
									<label>Quantidade</label>
									<input id="quantidade" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-3">
									<label>Quantidade Min.</label>
									<input id="min" name="valor" type="text" class="form-control" placeholder="Quantidade minima é para um alerta de estoque...">
								</div>
								<div class="form-group col-md-12">
									<label>Descrição</label>
									<textarea id="descricao" name="descricao" class="form-control" rows="3"></textarea>
								</div>
								<!-- <button id="salvar" class="btn btn-primary btn-adicionar"></button> -->
							</div>
							<button id="salvar-produto" type="button" class="btn btn-primary" data-dismiss="modal">SALVAR</button>
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
						<h2 class="title-pag">Alterar Produto</h2>
						<div id="novo-elemento">
							<div class="row">
								<input id="id_produto" name="id_produto" type="hidden">
								<div class="form-group col-md-6">
									<label>Nome</label>
									<input id="nome-editar" name="nome" type="text" class="form-control">
								</div>
								<div class="form-group col-md-6" id="categoria">
									<label>Categoria</label>
									<select id="categoria-editar" name="categoria" class="form-control"></select>
								</div>
								<div class="form-group col-md-3">
									<label>Codigo interno</label>
									<input id="nro-editar" name="nro-editar" type="text" class="form-control">
								</div>
								<div class="form-group col-md-3">
									<label>Valor</label>
									<input id="valor-editar" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-3">
									<label>Quantidade</label>
									<input id="quantidade-editar" name="valor" type="text" class="form-control">
								</div>
								<div class="form-group col-md-3">
									<label>Quantidade Min.</label>
									<input id="min-editar" name="valor" type="text" class="form-control" placeholder="Quantidade minima é para um alerta de estoque...">
								</div>
								<div class="form-group col-md-12">
									<label>Descrição</label>
									<textarea id="descricao-editar" name="descricao" class="form-control" rows="3"></textarea>
								</div>
								<!-- <button id="salvar" class="btn btn-primary btn-adicionar"></button> -->
							</div>
							<button id="alterar-produto" type="button" class="btn btn-primary" data-dismiss="modal">ALTERAR</button>
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
						<h2 class="title-pag">Detalhe do produto</h2>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">Nome</th>
											<th scope="col">Categoria</th>
											<th scope="col">Valor</th>
											<th scope="col">Quantidade</th>
											<th scope="col">Descrição</th>
											<th scope="col">Codigo</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="nome">Mark</td>
											<td class="categoria">Mark</td>
											<td class="valor">Mark</td>
											<td class="quantidade">Otto</td>
											<td class="descricao">@mdo</td>
											<td class="nro">@mdo</td>
										</tr>
									</tbody>
								</table>
							</div>

							<!-- Para a class row nao alinha tudo -->
							<div class="col-md-12">
								<hr class="my-4">
							</div>

							<div class="col-md-6">
								<h2 class="title-model text-center">Lucro do produto</h2>
								<div class="alert alert-primary text-center quantidade-venda" role="alert">
									R$200,00
								</div>
							</div>
							<div class="col-md-6">
								<h2 class="title-model text-center">Quantidade de vendas</h2>
								<div class="alert alert-primary text-center quantidade-venda" role="alert">
									200 Produtos
								</div>
							</div>
							<!-- Para a class row nao alinha tudo -->
							<div class="col-md-12">
								<hr class="my-4">
							</div>
							<div class="col-md-6">
								<h2 class="title-model text-center">Clientes</h2>
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
								<h2 class="title-model text-center">Fornecedores</h2>
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
					<th scope="col">NOME</th>
					<th scope="col">CATEGORIA</th>
					<th scope="col">VALOR</th>
					<th scope="col">DESCRIÇÃO</th>
					<th class="text-center" scope="col">DETALHAMENTO</th>
					<th class="text-center" scope="col">EDITAR</th>
					<th class="text-center" scope="col">EXCLUIR</th>
				</tr>
			</thead>
			<tbody id="produtos">
			</tbody>
		</table>		
	</div>
	<div class="tab-pane fade" id="relatorio" role="tabpanel" aria-labelledby="profile-tab">
		<h2 class="title-pag">Relatorio dos Produtos</h2>
	</div>
</div>
<script src="/System/systemBasic/js/produtos.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>