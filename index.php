<?php
	include 'helper/autoLoad.php';
	session_start();

	use lib\Main;

	$ini = new Main();
	if ($ini->getMain() == 'Site' || $ini->getMain() == 'Login' || $_SESSION['logado'] == true) {
		$ini->run();
	}else{
		// $ini->setLogin();
		// $ini->run();
		header('Location: /System/systemBasic/Login');
	}

