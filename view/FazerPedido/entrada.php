<?php
	$tipo = 'entrada';
	$cf = 'Fornecedor';
?>
<?php include 'view/patterns/header1.php' ?>
	<div class="container">
		<div id="produtos" class="row">
			<div class="col-md-12">
				<h1 class="title-pag">Fornecedor: <?= $nome ?></h1>
				<p id="rs">Total: R$<span id="valores"> 0,00</span></p>
				<span id="id_cf" class="none"><?= $id ?></span>
			</div>
		</div>
	</div>
	<script src="/System/systemBasic/js/entrada.js" type="text/javascript"></script>
<?php include 'view/patterns/footer1.php' ?>