<?php include 'view/patterns/header.php' ?>
<!-- <h1 class="title-pag">Perfil</h1> -->
<div class="card">
	<div class="text-center">
		<img class="rounded-circle" src="/System/systemBasic/images/user.png" class="rounded" alt="Usuario">
	</div>
	<div class="card-body">
		<h5 class="card-title">Fernando Batista</h5>
	</div>
	<ul class="list-group list-group-flush">
		<li class="list-group-item"><span class="font-weight-bold">Nome: </span>Fernando</li>
		<li class="list-group-item"><span class="font-weight-bold">Email: </span>nando@hotmail.com</li>
		<li class="list-group-item"><span class="font-weight-bold">Login: </span>Fernando</li>
		<li class="list-group-item"><span class="font-weight-bold">Senha: </span>********</li>
	</ul>
	<ul class="list-group list-group-flush">
		<li class="list-group-item"><span class="font-weight-bold">Local: </span>Rua Piratininga, 234, serraria Diadema, SP</li>
		<li class="list-group-item"><span class="font-weight-bold">Nome Fantasia: </span>FBO - Sistemas</li>
		<li class="list-group-item"><span class="font-weight-bold">Usuario: </span>Master</li>
		<li class="list-group-item"><span class="font-weight-bold">Plano: </span>Basico</li>
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
<?php include 'view/patterns/footer.php' ?>