<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Produtos</h1>
<!-- <a href="/System/systemBasic/Produtos/novo" class="btn btn-primary">NOVO</a> -->
<!-- Extra large modal -->
<button type="button" class="btn btn-primary btn-adicionar" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<h1 class="title-pag">Novo Produto</h1>
			<div id="novo-elemento">
				<div class="row">
					<div class="form-group col-md-6">
						<label>Nome</label>
						<input id="nome" name="nome" type="text" class="form-control">
					</div>
					<div class="form-group col-md-6" id="categoria">
						<label>Categoria</label>
						<select id="categoria" name="categoria" class="form-control"></select>
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
				<button id="salvar-produto" type="button" class="btn btn-primary" data-dismiss="modal">SALVAR</button>
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
<script src="/System/systemBasic/js/produtos.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>