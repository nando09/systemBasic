<?php

	$retorno = array();
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		$user = 'postgres';
		$pass = 'fer7660nando';
		// $pass = 'Sof@1502';
		$db = new PDO('pgsql:host=localhost;port=5432;dbname=system', $user, $pass);

		// PDO('pgsql:host=localhost;port=5432;dbname=system', 'postgres', 'fer7660nando');
		// print_r("Conexão ligada com sucesso!");
		$query = $db->query("SELECT ID, NOME FROM PRODUTO");

		foreach ($query as $key) {
			array_push($retorno, $key);
		}

		// $query = $db->query("SELECT p.nome, c.nome as categoria, p.valor, p.descricao FROM produto AS p INNER JOIN categoria AS c ON p.id_categoria = c.id");

		// foreach ($query as $key) {
		// 	array_push($retorno, $key);
		// }


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
