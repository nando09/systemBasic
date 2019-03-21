<?php $usuario = $_SESSION['id_usuario'] ?>
<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Configuração</h1>
<div id="card">
	<span class="none" id="id_usr"><?= $usuario ?></span>
	<div class="card" style="width: 18rem;">
		<img class="rounded-circle" src="/System/systemBasic/images/user.png"alt="Usuario">
		<div class="card-body">
			<h5 class="usuario"></h5>
			<p class="tipo"></p>
			<a href="/System/systemBasic/Perfil/editar" class="btn btn-primary">Editar</a>
		</div>
	</div>
</div>
<script src="/System/systemBasic/js/configuracao.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>