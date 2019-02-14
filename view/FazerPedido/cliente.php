<?php
	$tipo = 'saida';
	$cf = 'Cliente';
?>
<?php include 'view/patterns/header1.php' ?>
	<div class="container">
		<div id="produtos" class="row">
			<div class="col-md-12">
				<h1 class="title-pag">Cliente: <?= $nome ?></h1>
				<span id="id_cf" class="none"><?= $id ?></span>
			</div>
		</div>
	</div>
	<script src="/System/systemBasic/js/saida-produtos.js" type="text/javascript"></script>
<?php include 'view/patterns/footer1.php' ?>