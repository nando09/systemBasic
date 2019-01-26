<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Clientes</h1>
<!-- <a href="/System/systemBasic/clientes/novo" class="btn btn-primary">NOVO</a> -->
<!-- Extra large modal -->
<button type="button" class="btn btn-primary btn-adicionar" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<h1 class="title-pag">Novo cliente</h1>
			<div id="novo-elemento">
				<div class="row">
					<div class="form-group col-md-6">
						<label>NOME</label>
						<input id="nome" type="text" class="form-control">
					</div>
					<div class="form-group col-md-6" id="categoria">
						<label>EMPRESA</label>
						<input id="empresa" type="text" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>CNPJ</label>
						<input id="cnpj" type="text" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>LOCALIDADE</label>
						<input id="localidade" type="text" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>EMAIL</label>
						<input id="email" type="text" class="form-control">
					</div>
					<div class="form-group col-md-12">
						<label>TELEFONE</label>
						<input id="telefone" class="form-control" rows="3">
					</div>
				</div>
				<button id="salvar-cliente" type="button" class="btn btn-primary" data-dismiss="modal">SALVAR</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-xl editar" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<h1 class="title-pag">Alterar cliente</h1>
			<div id="novo-elemento">
				<div class="row">
					<input id="id_cliente" type="hidden">
					<div class="form-group col-md-6">
						<label>NOME</label>
						<input id="nome-editar" type="text" class="form-control">
					</div>
					<div class="form-group col-md-6" id="categoria">
						<label>EMPRESA</label>
						<input id="empresa-editar" type="text" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>CNPJ</label>
						<input id="cnpj-editar" type="text" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>LOCALIDADE</label>
						<input id="localidade-editar" type="text" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>EMAIL</label>
						<input id="email-editar" type="text" class="form-control">
					</div>
					<div class="form-group col-md-12">
						<label>TELEFONE</label>
						<input id="telefone-editar" class="form-control" rows="3">
					</div>
				</div>
				<button id="alterar-cliente" type="button" class="btn btn-primary" data-dismiss="modal">ALTERAR</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-xl detalhamento" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div id="detalhamento" class="modal-content">
			<div class="container">
				<h1 class="title-pag">Detalhe do cliente</h1>
				<div class="row">
					<div class="col-md-4 nome">NOME</div>
					<div class="col-md-4 empresa">EMPRESA</div>
					<div class="col-md-4 cnpj">CNPJ</div>
					<div class="col-md-4 localidade">LOCALIDADE</div>
					<div class="col-md-4 email">EMAIL</div>
					<div class="col-md-4 telefone">TELEFONE</div>
				</div>
			</div>
		</div>
	</div>
</div>

<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">EMPRESA</th>
			<th scope="col">EMAIL</th>
			<th scope="col">TELEFONE</th>
			<th class="text-center" scope="col">DETALHAMENTO</th>
			<th class="text-center" scope="col">EDITAR</th>
			<th class="text-center" scope="col">EXCLUIR</th>
		</tr>
	</thead>
	<tbody id="clientes">
	</tbody>
</table>
<script src="/System/systemBasic/js/clientes.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>