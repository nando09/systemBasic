<?php
	if(empty($view_dados[0])) {
		$usuario = $_SESSION['id_usuario'];
	}else{
		$usuario = $view_dados[0];
	}
?>
<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Editar</h1>
<div class="editar-perfil">
	<span class="none" id="id_usr"><?= $usuario ?></span>
	<form method="post" action="/System/systemBasic/view/Perfil/salva-perfil.php">
		<input type="hidden" readonly class="form-control-plaintext" name="id_usr" id="id_usr" value="<?= $usuario ?>">
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Nome: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="Nome" id="Nome" placeholder="Nome">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Email: </label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Login: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="Login" id="Login" placeholder="Login">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Senha: </label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="Senha" id="Senha" placeholder="Senha" value="******">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Usuario: </label>
			<div class="col-sm-10">
				<select class="form-control" name="tipos" id="tipos">
					
				</select>
			</div>
		</div>
		<button class="btn btn-primary" type="submit">Atualizar</button>
	</form>
</div>
<!--
Nome: Fernando
Email: nando@hotmail.com
Login: Fernando
Senha: ********
Local: Rua Piratininga, 234, serraria Diadema, SP
Nome Fantasia: FBO - Sistemas
Usuario: Master
Plano: Basico
-->
<script src="/System/systemBasic/js/perfil-edit.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>