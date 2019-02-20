<?php
	$tipo = 'saida';
	$cf = 'Cliente';
?>
<?php include 'view/patterns/header1.php' ?>
	<button onclick='history.go(-1);'>Voltar</button>;
	<div class="container">
		<div id="produtos" class="row">
			<div class="col-md-12">
				<h1 class="title-pag">Cliente: <?= $nome ?></h1>
				<p id="rs">Total: R$<span id="valores"> 0,00</span></p>
				<span id="id_cf" class="none"><?= $id ?></span>
			</div>
		</div>
	</div>
	<script src="/System/systemBasic/js/saida.js" type="text/javascript"></script>
<?php include 'view/patterns/footer1.php' ?>