<?php $usuario = $_SESSION['usuario']; ?>
<?php include 'view/patterns/header.php' ?>
<!-- <h1 class="title-pag">Perfil</h1> -->
<div class="card">
	<span class="none" id="id_usr"><?= $usuario ?></span>
	<div class="text-center">
		<img class="rounded-circle" src="/System/systemBasic/images/user.png" class="rounded" alt="Usuario">
	</div>
	<div class="card-body">
		<h5 class="card-title">Fernando Batista</h5>
	</div>
	<ul class="list-group list-group-flush">
		<li class="list-group-item font-weight-bold">Nome: <span class="font-weight-normal" id="Nome">Fernando</span></li>
		<li class="list-group-item font-weight-bold">Email: <span class="font-weight-normal" id="Email">nando@hotmail.com</span></li>
		<li class="list-group-item font-weight-bold">Login: <span class="font-weight-normal" id="Login">Fernando</span></li>
		<li class="list-group-item font-weight-bold">Senha: <span class="font-weight-normal" id="Senha">********</span></li>
	</ul>
	<ul class="list-group list-group-flush">
		<li class="list-group-item font-weight-bold">Local: <span class="font-weight-normal" id="Local">Rua Piratininga, 234, serraria Diadema, SP</span></li>
		<li class="list-group-item font-weight-bold">Nome Fantasia: <span class="font-weight-normal" id="Fantasia">FBO - Sistemas</span></li>
		<li class="list-group-item font-weight-bold">Usuario: <span class="font-weight-normal" id="Usuario">Master</span></li>
		<li class="list-group-item font-weight-bold">Plano: <span class="font-weight-normal" id="Plano">Basico</span></li>
		<li class="list-group-item font-weight-bold">Valor: <span class="font-weight-normal" id="Valor">Valor</span></li>
	</ul>
	<div class="card-body" class="botao">
		<a href="/System/systemBasic/Perfil/editar" class="card-link btn btn-info">Editar</a>
		<a href="/System/systemBasic/Perfil/configuracao" class="card-link btn btn-secondary">Configurações</a>
	</div>
</div>
<!--
<p>Foto</p>
****Informãção****
<p>Nome</p>
<p>Email</p>
<p>Login</p>
<p>Senha</p>
****Geral****
<p>Local</p>
<p>Nome Fantasia</p>
<p>Usuario</p>
<p>Plano</p> 
-->
<script src="/System/systemBasic/js/perfil-home.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>