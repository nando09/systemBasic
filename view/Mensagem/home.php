<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Mensagem</h1>
<table class="table table-sm">
	<thead>
		<tr>
			<th scope="col">De</th>
			<th scope="col">Assunto</th>
			<th scope="col">Descrição</th>
			<th scope="col">Data</th>
			<th scope="col" class="text-center">Excluir</th>
		</tr>
	</thead>
	<tbody id="mensagens">
	</tbody>
</table>
<div data-backdrop="static" class="modal fade bd-example-mensagem-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
</div>
<script src="/System/systemBasic/js/mensagem.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>