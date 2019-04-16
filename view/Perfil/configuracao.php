<?php $usuario = $_SESSION['id_usuario'] ?>
<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Configuração</h1>
<div id="card">
	<span class="none" id="id_usr"><?= $usuario ?></span>
	<div class="container">
		<div class="row" id="usuarios">
		</div>
	</div>
</div>
<script src="/System/systemBasic/js/configuracao.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>