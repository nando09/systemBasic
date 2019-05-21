<?php
	$user = 'root';
	$pass = 'fer7660nando';
	$base = 'chat';
	$host = 'localhost';
	$port = '';
	$db = new PDO("mysql:host=$host$port;dbname=$base;options='-c client_encoding=utf8'", $user, $pass, [
		PDO::ATTR_EMULATE_PREPARES => false, 
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
	]);

	date_default_timezone_set('America/Sao_Paulo');
	$globalData	=	date("d/m/Y");
	$globalHora	=	date("H:i");
	$shouNome	=	false;

	if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != null) {
		$nomeAtual		=	$_SESSION['nome'];
		$usuarioAtual	=	$_SESSION['usuario'];
		$shouNome		=	true;
	}
?>