<?php

	$retorno = "";
	// // Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = "SELECT COUNT(*) as COUNT FROM MENSAGEM";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetch();
		$count = $user['count'];

		$retorno = $count;
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>

