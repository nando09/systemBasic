<div id="content">
	<form action="" method="post" enctype="multipart/form-data">
		<label>Usuário</label>
		<p><input type="text" name="usuario" placeholder="Usuário" class="form-control"></p>

		<label>Senha</label>
		<p><input type="password" name="senha" placeholder="********" class="form-control"></p>

		<p><input type="submit" name="Entrar"  placeholder="********" class="btn btn-primary btn-lg btn-block"></p>
		<input type="hidden" name="env" value="login">
	</form>
	<?php 
		if (isset($_POST['env']) && $_POST['env'] == "login") {
			echo "Tentei logar!";
		}
	?>
</div>
