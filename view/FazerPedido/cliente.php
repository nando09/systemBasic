<?php
	$tipo = 'saida';
	$cf = 'Cliente';
?>
<?php include 'view/patterns/header1.php' ?>
	<div class="container">
		<div id="produtos" class="row">
			<div class="col-md-12">
				<h1 class="title-pag">Cliente: <?= $nome ?></h1>
				<p id="rs">Total: R$<span id="valores"> 0,00</span></p>
				<span id="id_cf" class="none"><?= $id ?></span>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="finaliza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Finalizar pedido</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="data-finalizar">Data de entrega!</label>
						<input type="date" class="form-control" id="data-finalizar" placeholder="name@example.com">
					</div>
					<select id="status" class="form-control" id="exampleFormControlSelect1">
						<option>PENDENTE</option>
						<option>PAGO</option>
					</select>
				</div>
				<div class="modal-footer">
					<button id="finalizar" type="button" class="btn btn-primary">Gravar pedido</button>
				</div>
			</div>
		</div>
	</div>
	<script src="/System/systemBasic/js/saida-produtos.js" type="text/javascript"></script>
<?php include 'view/patterns/footer1.php' ?>