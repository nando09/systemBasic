<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
	session_start();

	if ($_POST) {
		$usuario = $_POST['nome'];
		$senha = $_POST['senha'];

		$query = "SELECT NOME,USUARIO,SENHA FROM USUARIO WHERE USUARIO = '". $usuario ."' AND SENHA = MD5('". $senha ."')";
		// $query = "SELECT NOME,USUARIO,SENHA FROM USUARIO WHERE USUARIO = '?' AND SENHA = MD5('?')";
		// $query = "SELECT NOME,USUARIO,SENHA FROM USUARIO WHERE USUARIO = ':teste' AND SENHA = MD5(':senha')";
		// $statement = $db->prepare($query);
		// $statement->execute();


		$stmt = $db->prepare($query);
		// $stmt->bindParam(':teste', $usuario, PDO::PARAM_INT);
		// $stmt->bindParam(':senha', $senha, PDO::PARAM_INT);
		// $stmt->execute(array($usuario, $senha)); 
		$stmt->execute(); 
		$user = $stmt->fetch();

		echo "<h1>" . $user['nome'] . "</h1>";
	}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="description" content="Login - Sistema de estoque">
	<meta name="author" content="Fernando Batista">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/System/systemBasic/css/login.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div id="container-login">
		<div id="title">
			<i class="material-icons lock">lock</i> Login
		</div>
		<form method="post">
			<div class="input">
				<div class="input-addon">
					<i class="material-icons">face</i>
				</div>
				<input name="nome" id="username" placeholder="Usuário" type="text" class="validate" autocomplete="off">
			</div>

			<div class="clearfix"></div>

			<div class="input">
				<div class="input-addon">
					<i class="material-icons">vpn_key</i>
				</div>
				<input name="senha" id="password" placeholder="Senha" type="password" class="validate" autocomplete="off">
			</div>

			<div class="remember-me">
				<input type="checkbox">
				<span style="color: #DDD">Me lembre</span>
			</div>

			<input type="submit" value="Entrar" />
		</form>
		<div>
			<?php
				if (isset($errs)) :
					foreach ($errs as $key):
						echo $key;
					endforeach;
				endif;
			?>
		</div>
		<div class="forgot-password">
			<a href="#">Esqueceu sua senha?</a>
		</div>
		<div class="register">
			Não tem uma conta ainda?
			<a href="register.html"><button id="register-link">Registre-se aqui</button></a>
		</div>
	</div>
</body>

</html>
