<?php

	// print_r($_POST);

	$retorno = array(
		'retorno' => ''
	);

	$tr = '';

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$categoria = $_POST['categoria'];

		$query = "SELECT * FROM CATEGORIA WHERE NOME = :categoria";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute(array(':categoria' => $categoria)); 
		$count = $stmt->rowCount();

		if ($count > 0) {
			$retorno = array(
				'retorno' => 'E'
			);

			echo json_encode($retorno);
			exit();
		}

		$query = "INSERT INTO CATEGORIA (NOME) VALUES (:categoria);";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute(array(':categoria' => $categoria)); 

		$retorno = array(
			'retorno' => 'S'
		);

	}catch(Exception $e){
		$retorno = array(
			'retorno' => 'N'
		);
	}

	echo json_encode($retorno);
