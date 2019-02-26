<?php $usuario = $_SESSION['usuario'] ?>
<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Editar</h1>
<div class="editar-perfil">
	<span class="none" id="id_usr"><?= $usuario ?></span>
	<form method="post">
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Nome: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Nome" placeholder="Nome">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Email: </label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="Email" placeholder="Email">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Login: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Login" placeholder="Login">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Senha: </label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="Senha" placeholder="Senha">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Estado: </label>
			<div class="col-sm-2">
				<select id="estado" class="form-control">
					<option value="AC">AC</option>
					<option value="AL">AL</option>
					<option value="AP">AP</option>
					<option value="AM">AM</option>
					<option value="BA">BA</option>
					<option value="CE">CE</option>
					<option value="DF">DF</option>
					<option value="ES">ES</option>
					<option value="GO">GO</option>
					<option value="MA">MA</option>
					<option value="MT">MT</option>
					<option value="MS">MS</option>
					<option value="MG">MG</option>
					<option value="PA">PA</option>
					<option value="PB">PB</option>
					<option value="PR">PR</option>
					<option value="PE">PE</option>
					<option value="PI">PI</option>
					<option value="RJ">RJ</option>
					<option value="RN">RN</option>
					<option value="RS">RS</option>
					<option value="RO">RO</option>
					<option value="RR">RR</option>
					<option value="SC">SC</option>
					<option value="SP">SP</option>
					<option value="SE">SE</option>
				</select>
			</div>
			<label for="inputPassword" class="col-sm-1 col-form-label">Cidade: </label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="Cidade" placeholder="Cidade">
			</div>
			<label for="inputPassword" class="col-sm-1 col-form-label">Bairro: </label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="Bairro" placeholder="Bairro">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Rua: </label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="Rua" placeholder="Rua">
			</div>
			<label for="inputPassword" class="col-sm-1 col-form-label">Numero: </label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="Numero" placeholder="N°">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Nome Fantasia: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Fantasia" placeholder="Fantasia">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-2 col-form-label">Usuario: </label>
			<div class="col-sm-10">
				<input type="text" readonly class="form-control-plaintext" id="Usuario" value="Master">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-2 col-form-label">Plano: </label>
			<div class="col-sm-10">
				<input type="text" readonly class="form-control-plaintext" id="Plano" value="Plano">
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