<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	if ($_POST) {
		$usuario = $_POST['nome'];
		$senha = $_POST['senha'];
		
		$query = "SELECT U.ID AS ID, U.NOME AS NOME, U.USUARIO AS USUARIO, T.ACESSO AS TIPO FROM USUARIO U INNER JOIN TIPOS AS T ON T.ID = U.ID_TIPOS WHERE U.USUARIO = :usuario AND U.SENHA = MD5(:senha)";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':usuario', $usuario, PDO::PARAM_INT);
		$stmt->bindParam(':senha', $senha, PDO::PARAM_INT);
		$stmt->execute(); 
		$user = $stmt->fetch();
		if ($stmt->rowCount() == 1) {
			$_SESSION['logado'] = true;
			$_SESSION['nome'] = $user['nome'];
			$_SESSION['usuario'] = $user['usuario'];
			$_SESSION['acessos'] = $user['tipo'];
			$_SESSION['id_usuario'] = $user['id'];

			header('Location: /System/systemBasic/Painel');
		}else{
			$msg_login = "
				<br>
				<div class='alert alert-secondary' role='alert'>
					Senha/Usuário esta incorreto!
				</div>";
		}
	}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="description" content="Login - Sistema de estoque">
	<meta name="author" content="Fernando Batista">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap.css" rel="stylesheet">
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
				<input name="nome" id="username" placeholder="Usuário" type="text" class="validate">
			</div>

			<div class="clearfix"></div>

			<div class="input">
				<div class="input-addon">
					<i class="material-icons">vpn_key</i>
				</div>
				<input name="senha" id="password" placeholder="Senha" type="password" class="validate">
			</div>

			<div class="remember-me">
			</div>

			<input type="submit" value="Entrar" />
		</form>
		<div class="forgot-password">
			<a href="#">Esqueceu sua senha?</a>
		</div>
		<div class="register">
			Não tem uma conta ainda?
			<a href="register.html"><button id="register-link">Registre-se aqui</button></a>
		</div>
		<?php
			if (isset($msg_login) && !empty($msg_login)) {
				echo $msg_login;
			}
		?>
	</div>
</body>

</html>
