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
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];

			if ($usuario == '' || $senha == '') {
				echo "<code>Preencha todos os campos!</code>";
			}else{
				$query = "SELECT * FROM usuario WHERE usuario = :usuario AND  senha = MD5(:senha)";
				$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$stmt->execute(array(':usuario' => $usuario, ':senha' => $senha));
				$count = $stmt->rowCount();

				if ($count) {
					$user = $stmt->fetch();
					$_SESSION['id'] = $user['id'];
					$_SESSION['nome'] =  $user['nome'];
					$_SESSION['usuario'] =  $user['usuario'];

					echo "<meta http-equiv='Refresh' content='1; url=?pagina=usuarios'>";
				}else{
					echo "<code>Usuario ou senha invalida!</code>";
				}
			}
		}
	?>
</div>
