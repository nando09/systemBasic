<?php

	// print_r($_POST);

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = "INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('". $_POST['nome'] ."', " . $_POST['categoria'] . ", ". $_POST['valor'] .", '". $_POST['descricao'] ."', 10, 30)";

		if ($db->query($query)) {
			$retorno = 'S';
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
