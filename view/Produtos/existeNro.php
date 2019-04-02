<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];
		$nro = $_POST['nro'];

		$query = "SELECT COUNT(*) AS EXISTE FROM PRODUTO WHERE ID <> '$id' AND NRO = '$nro'";
		// die($query);
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute(); 
		$user = $stmt->fetch();
		$retorno = $user['existe'];
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

	echo json_encode($retorno);
?>
