<?php

	// $retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	// try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
		$id = $_POST['id'];

		$query = "SELECT NOME, EMAIL, USUARIO, ENDERECO, FANTASIA, TIPO, VALOR, PLANO FROM USUARIO WHERE USUARIO = :usuario";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute(array(':usuario' => $id)); 
		$user = $stmt->fetch();
		$retorno = array(
			'NOME' => $user['nome'],
			'EMAIL' => $user['email'],
			'USUARIO' => $user['usuario'],
			'ENDERECO' => $user['endereco'],
			'FANTASIA' => $user['fantasia'],
			'TIPO' => $user['tipo'],
			'VALOR' => $user['valor'],
			'PLANO' => $user['plano']
		);
		// $retorno = $user['nome'];
	// }catch(Exception $e){
	// 	$retorno = 'N';
	// }

	echo json_encode($retorno);
?>
