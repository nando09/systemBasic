<?php

	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
	session_start();

	if ($_SESSION['logado'] == true) {

	}else{
		header('Location: /System/systemBasic/Login');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
</head>
<body>
	<h1>Olá <?= $_SESSION['nome']  ?></h1>
</body>
</html>
