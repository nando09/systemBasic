<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Mensagem</h1>
<!-- <a href="/System/systemBasic/" class="btn btn-primary btn-adicionar">NOVO</a> -->
<button type="button" class="btn btn-primary btn-adicionar" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>
<div data-backdrop="static" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h2 class="title-pag">Nova mensagem</h2>
				<div id="novo-elemento" class="row">
					<div class="form-group col-md-6">
						<label>Para </label>
						<select id="nome" name="nome" type="text" class="form-control"></select>
					</div>
					<div class="form-group col-md-6">
						<label>Assunto </label>
						<input id="assunto" name="assunto" type="text" class="form-control">
					</div>
					<div class="form-group col-md-12">
						<label>Mensagem </label>
						<textarea id="descricao" name="descricao" type="text" class="form-control"></textarea>
					</div>
				</div>
				<button id="salvar-projeto" type="button" class="btn btn-primary">Salvar</button>
			</div>
		</div>
	</div>
</div>
<div data-backdrop="static" class="modal fade modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div id="conversa-box" class="container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h2 class="title-pag">Conversa</h2>
				<div id="conversas" class="row">
					<div class="form-group conversas-textarea col-md-12">
						<div class="input-group">
							<input type="hidden" id="id-msg">
							<textarea id="descricao-msg" name="descricao" type="text" class="form-control"></textarea>
							<div class="input-group-append" id="button-addon4">
								<button id="salvar-msg" class="btn btn-primary" type="button">Enviar</button>
								<button id="limpar-msg" class="btn btn-danger" type="button">Limpar</button>
							</div>
						</div>
					</div>
					<div class="col-md-12 msg-conversas">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col" class="text-uppercase">Enviou</th>
			<th scope="col" class="text-uppercase">Recebeu</th>
			<th scope="col" class="text-uppercase">Assunto</th>
			<th scope="col" class="text-uppercase">Mensagem</th>
		</tr>
	</thead>
	<tbody id="entrada">
	</tbody>
</table>
<script src="/System/systemBasic/js/entradamensagem.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>

