<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		// $query = $db->query("SELECT ID, EMPRESA, EMAIL, TELEFONE FROM CLIENTE");
		$query = "SELECT COUNT(LIDA) AS LIDA FROM MENSAGEM WHERE LIDA = 'NAO'";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$msg = $stmt->fetch();
		$count = $msg['lida'];

		$retorno = $count;
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
