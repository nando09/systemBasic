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
		<h1 class="title-pag">Clientes</h1>
		<!-- <a href="/System/systemBasic/clientes/novo" class="btn btn-primary">NOVO</a> -->
		<!-- Extra large modal -->
		<button type="button" class="btn btn-primary btn-adicionar" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>

		<div data-backdrop="static" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h1 class="title-pag">Novo cliente</h1>
						<div id="novo-elemento">
							<div class="row">
								<div class="form-group col-md-4">
									<label>NOME <span class="obrigatorio"> *</span></label>
									<input id="nome" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4" id="categoria">
									<label>EMPRESA</label>
									<input id="empresa" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>CNPJ</label>
									<input id="cnpj" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>TELEFONE <span class="obrigatorio"> *</span></label>
									<input id="telefone" class="form-control" rows="3" maxlength="20">
								</div>
								<div class="form-group col-md-8">
									<label>EMAIL</label>
									<input id="email" type="text" class="form-control">
								</div>
								<div class="form-group col-sm-2">
									<label>Estado: </label>
									<select name="estado" id="estado" class="form-control">
										<option value="AC">AC</option>
										<option value="AL">AL</option>
										<option value="AP">AP</option>
										<option value="AM">AM</option>
										<option value="BA">BA</option>
										<option value="CE">CE</option>
										<option value="DF">DF</option>
										<option value="ES">ES</option>
										<option value="GO">GO</option>
										<option value="MA">MA</option>
										<option value="MT">MT</option>
										<option value="MS">MS</option>
										<option value="MG">MG</option>
										<option value="PA">PA</option>
										<option value="PB">PB</option>
										<option value="PR">PR</option>
										<option value="PE">PE</option>
										<option value="PI">PI</option>
										<option value="RJ">RJ</option>
										<option value="RN">RN</option>
										<option value="RS">RS</option>
										<option value="RO">RO</option>
										<option value="RR">RR</option>
										<option value="SC">SC</option>
										<option value="SP">SP</option>
										<option value="SE">SE</option>
									</select>
								</div>
								<div class="form-group col-sm-5">
									<label>Cidade: </label>
									<input type="text" class="form-control" name="Cidade" id="cidade" placeholder="Cidade">
								</div>
								<div class="form-group col-sm-5">
									<label>Bairro: </label>
									<input type="text" class="form-control" name="Bairro" id="bairro" placeholder="Bairro">
								</div>
								<div class="form-group col-sm-10">
									<label>Rua: </label>
									<input type="text" class="form-control" name="Rua" id="rua" placeholder="Rua">
								</div>
								<div class="form-group col-sm-2">
									<label>Numero: </label>
									<input type="text" class="form-control" name="Numero" id="numero" placeholder="N°">
								</div>
							</div>
							<button id="salvar-cliente" type="button" class="btn btn-primary">SALVAR</button>
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
						<h1 class="title-pag">Alterar cliente</h1>
						<div id="novo-elemento">
							<div class="row">
								<input id="id_cliente" type="hidden">
								<div class="form-group col-md-4">
									<label>NOME <span class="obrigatorio"> *</span></label>
									<input id="nome-editar" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4" id="categoria">
									<label>EMPRESA</label>
									<input id="empresa-editar" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>CNPJ</label>
									<input id="cnpj-editar" type="text" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label>TELEFONE <span class="obrigatorio"> *</span></label>
									<input id="telefone-editar" class="form-control" rows="3" maxlength="13" maxlength="20">
								</div>
								<div class="form-group col-md-8">
									<label>EMAIL</label>
									<input id="email-editar" type="text" class="form-control">
								</div>
								<div class="form-group col-sm-2">
									<label>Estado: </label>
									<select name="estado-editar" id="estado-editar" class="form-control">
										<option value="AC">AC</option>
										<option value="AL">AL</option>
										<option value="AP">AP</option>
										<option value="AM">AM</option>
										<option value="BA">BA</option>
										<option value="CE">CE</option>
										<option value="DF">DF</option>
										<option value="ES">ES</option>
										<option value="GO">GO</option>
										<option value="MA">MA</option>
										<option value="MT">MT</option>
										<option value="MS">MS</option>
										<option value="MG">MG</option>
										<option value="PA">PA</option>
										<option value="PB">PB</option>
										<option value="PR">PR</option>
										<option value="PE">PE</option>
										<option value="PI">PI</option>
										<option value="RJ">RJ</option>
										<option value="RN">RN</option>
										<option value="RS">RS</option>
										<option value="RO">RO</option>
										<option value="RR">RR</option>
										<option value="SC">SC</option>
										<option value="SP">SP</option>
										<option value="SE">SE</option>
									</select>
								</div>
								<div class="form-group col-sm-5">
									<label>Cidade: </label>
									<input type="text" class="form-control" name="cidade-editar" id="cidade-editar" placeholder="Cidade">
								</div>
								<div class="form-group col-sm-5">
									<label>Bairro: </label>
									<input type="text" class="form-control" name="Bairro" id="bairro-editar" placeholder="Bairro">
								</div>
								<div class="form-group col-sm-10">
									<label>Rua: </label>
									<input type="text" class="form-control" name="Rua" id="rua-editar" placeholder="Rua">
								</div>
								<div class="form-group col-sm-2">
									<label>Numero: </label>
									<input type="text" class="form-control" name="Numero" id="numero-editar" placeholder="N°">
								</div>
							</div>
							<button id="alterar-cliente" type="button" class="btn btn-primary">ALTERAR</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div data-backdrop="static" class="modal fade bd-example-modal-xl detalhamento" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h1 class="title-pag">Detalhe do cliente</h1>
						<div id="detalhamento">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">NOME</th>
												<th scope="col">EMPRESA</th>
												<th scope="col">CNPJ</th>
												<th scope="col">LOCALIDADE</th>
												<th scope="col">EMAIL</th>
												<th scope="col">TELEFONE</th>
												<th scope="col">ULTIMA COMPRA</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="nome">Mark</td>
												<td class="empresa">Mark</td>
												<td class="cnpj">Mark</td>
												<td class="localidade big-text">Mark</td>
												<td class="email">Otto</td>
												<td class="telefone">@mdo</td>
												<td class="ultima">1234</td>
											</tr>
										</tbody>
									</table>
								</div>

								<!-- Para a class row nao alinha tudo -->
								<div class="col-md-12">
									<hr class="my-4">
								</div>

								<div class="col-md-6">
									<h2 class="title-model text-center">Lucro do compras</h2>
									<div id="lucro-compra" class="alert alert-primary text-center quantidade-venda" role="alert">
										R$ 0,00
									</div>
								</div>
								<div class="col-md-6">
									<h2 class="title-model text-center">Quantidade de compras</h2>
									<div class="alert alert-primary text-center quantidade-venda" role="alert">
										<span id="quantidade-compras">0</span>  Produtos
									</div>
								</div>


								<!-- Para a class row nao alinha tudo -->
								<div class="col-md-12">
									<hr class="my-4">
								</div>

								<div class="col-md-6">
									<h2 class="title-model text-center">Produtos mais comprados</h2>
									<table class="table">
										<thead>
											<tr>
												<th scope="col">NOME</th>
												<th scope="col">VALOR (UNI)</th>
												<th scope="col">QUANTIDADE</th>
												<th scope="col">VALOR TOTAL</th>
											</tr>
										</thead>
										<tbody id="produtos">
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<h2 class="title-model text-center">Anotações</h2>
									<table class="table">
										<thead>
											<tr>
												<th scope="col">MENSAGEM</th>
												<th scope="col">DATA</th>
											</tr>
										</thead>
										<tbody id="mensagem">
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
					<th scope="col">TELEFONE</th>
					<th class="text-center" scope="col">DETALHAMENTO</th>
					<th class="text-center" scope="col">EDITAR</th>
					<th class="text-center" scope="col">EXCLUIR</th>
					<th class="text-center" scope="col">LOJA</th>
				</tr>
			</thead>
			<tbody id="clientes" class="tbody-primary">
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="relatorio" role="tabpanel" aria-labelledby="profile-tab">
		<h1 class="title-pag">Relatorio dos Clientes</h1>
		<div class="container relatorio">
			<div class="row text-center">
				<div class="col-md-4">
					<h3 class="relatorio-title">5 clientes que mais compra</h3>
					<canvas id="maisCompra" width="400" height="400"></canvas>
				</div>
				<div class="col-md-4">
					<h3 class="relatorio-title">Mais tempo que não compra</h3>
					<canvas id="novosClientes" width="400" height="400"></canvas>
				</div>
				<div class="col-md-4">
					<h3 class="relatorio-title">5 clientes que menos compra</h3>
					<canvas id="menosCompra" width="400" height="400"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/System/systemBasic/js/clientes.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>