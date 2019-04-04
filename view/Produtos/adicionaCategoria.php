<?php

	// print_r($_POST);

	$retorno = array(
		'retorno' => ''
	);

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
		$categoria = $_POST['categoria'];

		$query = "SELECT * FROM CATEGORIA WHERE NOME = :categoria";

		$del = $db->prepare($query);
		$del->execute(array(':categoria' => strtolower($categoria)));
		$count = $del->rowCount();

		if ($count > 0) {
			$retorno = array(
				'retorno' => 'E'
			);

			echo json_encode($retorno);
			exit();
		}

		// $query = "SELECT NOME,USUARIO,SENHA FROM USUARIO WHERE USUARIO = :teste AND SENHA = MD5(:senha)";
		$query = "INSERT INTO CATEGORIA (NOME) VALUES (:categoria)";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute(array(':categoria' => strtolower($categoria)));

	}catch(Exception $e){
		$retorno = array(
			'retorno' => 'N'
		);
	}

	echo json_encode($retorno);
