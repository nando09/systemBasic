<?php
	include 'helper/autoLoad.php';
	session_start();

	use lib\Main;
	use lib\Acesso;

	$ini = new Main();
	if ($ini->getMain() == 'Site' || $ini->getMain() == 'Login' || $_SESSION['logado'] == true) {
		// if () {
			$ini->run();
		// }
	}else{
		// $ini->setLogin();
		// $ini->run();
		header('Location: /System/systemBasic/Login');
	}

