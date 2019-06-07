<?php
	$tipo = 'saida';
	$cf = 'Cliente';
?>
<?php include 'view/patterns/header1.php' ?>
	<div class="container">
		<div id="produtos" class="row">
			<div class="col-md-12">
				<h1 class="title-pag">Cliente: <?= $nome ?></h1>
				<p id="rs">Total: <span id="valores">R$ 0,00</span></p>
				<span id="id_cf" class="none"><?= $id ?></span>
				<span id="id_finalizado" class="none"><?= $id_detalhe ?></span>
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
					<p class="text-center">Não precisa finalizar somente fazer suas alterações que já atualiza o pedido automaticamente.</p>
					<p class="text-center">Sempre verifique o detalhe do pedido para ter a certeza da atualização.</p>
				</div>
			</div>
		</div>
	</div>
	<script src="/System/systemBasic/js/saida.js" type="text/javascript"></script>
<?php include 'view/patterns/footer1.php' ?>