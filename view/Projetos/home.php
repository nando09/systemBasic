<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Projetos</h1>
<!-- <a href="/System/systemBasic/" class="btn btn-primary btn-adicionar">NOVO</a> -->
<button type="button" class="btn btn-primary btn-adicionar" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>
<div data-backdrop="static" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h2 class="title-pag">Novo Projeto</h2>
				<div id="novo-elemento" class="row">
					<div class="form-group col-md-6">
						<label>Nome </label>
						<input id="nome" name="nome" type="text" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label>Data </label>
						<input id="data" name="data" type="date" class="form-control">
					</div>
					<div class="form-group col-md-12">
						<label>Descrição </label>
						<textarea id="descricao" name="descricao" type="text" class="form-control">
						</textarea>
					</div>
				</div>
				<button id="salvar-projeto" type="button" class="btn btn-primary">SALVAR</button>
			</div>
		</div>
	</div>
</div>
<table class="table table-hover">
	<thead class="table table-hover">
		<tr>
			<th scope="col">NOME</th>
			<th scope="col">DESCRIÇÃO</th>
			<th scope="col">DETERMINADO</th>
			<th scope="col" class="text-center">FEITO</th>
		</tr>
	</thead>
	<tbody id="projetos" class="tbody-primary">
	</tbody>
</table>
<script src="/System/systemBasic/js/projetos.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>
