<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$nome		=	$_POST['nome'];
		$data		=	$_POST['data'];
		$descricao	=	$_POST['descricao'];

		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";

		$query = "INSERT INTO PROJETOS (ID_USER, DESCRICAO, DETERMINADO) VALUES (:id_usuario, :descricao, :data)";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':id_usuario', $nome, PDO::PARAM_INT);
		$stmt->bindParam(':descricao', $descricao, PDO::PARAM_INT);
		$stmt->bindParam(':data', $data, PDO::PARAM_INT);

		if ($stmt->execute()) {
			$retorno = 'S';
		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
