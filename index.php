<?php
	// Usuarios			1
	// Projetos			2
	// Relatorios		3
	// Mensagens		4
	// Fornecedores		5

	include 'helper/autoLoad.php';
	session_start();

	use lib\Main;
	use lib\Acesso;

	$ini = new Main();
	$acesso = new Acesso();
	$acesso->setTipos();

	if ($ini->getMain() == 'Site' || $ini->getMain() == 'Login' || $_SESSION['logado'] == true) {
		if ($acesso->acesso($ini->getMain()) || $ini->getMain() == 'Error') {
			$ini->run();
		}else{
			header('Location: /System/systemBasic/Error/invalido');
		}
	}else{
		// $ini->setLogin();
		// $ini->run();
		header('Location: /System/systemBasic/Login');
	}

