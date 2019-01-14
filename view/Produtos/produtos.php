<?php

	$retorno = array();
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		$user = 'postgres';
		// $pass = 'fer7660nando';
		$pass = 'Sof@1502';
		$db = new PDO('pgsql:host=localhost;port=5432;dbname=system', $user, $pass);

		// PDO('pgsql:host=localhost;port=5432;dbname=system', 'postgres', 'fer7660nando');
		// print_r("Conexão ligada com sucesso!");
		$query = $db->query("SELECT NOME FROM PRODUTO");

		foreach ($query as $key) {
			array_push($retorno, $key['nome']);
		}

		// foreach ($query as $dado) {
		// 	echo $dado;
		// }
		// exit();
	}catch(Exception $e){
		$retorno = 'N';
	}

	// print_r($retorno);
	// exit();

	echo json_encode($retorno);
