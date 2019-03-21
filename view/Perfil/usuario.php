<?php

	// $retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	// try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
		$id = $_POST['id'];
		// $end = array();

		$query = "SELECT NOME, EMAIL, USUARIO, ENDERECO, FANTASIA, TIPO, VALOR, PLANO FROM USUARIO WHERE ID = :usuario";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute(array(':usuario' => $id)); 
		$user = $stmt->fetch();

		$end = explode("&&END", $user['endereco']);
		// echo "<pre>";
		// print_r($end);
		// echo "</pre>";

		// echo "<pre>";
		// print_r($user['endereco']);
		// echo "</pre>";

		$endereco = "Rua: ". $end[0] .", N°". $end[1] ."; Bairro: ". $end[2] ."; Cidade: ". $end[3] ."; Estado: ". $end[4];

		$retorno = array(
			'NOME' 		=>		$user['nome'],
			'EMAIL' 	=>		$user['email'],
			'USUARIO' 	=>		$user['usuario'],
			'ENDERECO' 	=>		$endereco,
			'Rua' 		=>		$end[0],
			'Numero'	=>		$end[1],
			'Bairro' 	=>		$end[2],
			'Cidade' 	=>		$end[3],
			'Estado' 	=>		$end[4],
			'FANTASIA'	=>		$user['fantasia'],
			'TIPO'		=>		$user['tipo'],
			'VALOR'		=>		$user['valor'],
			'PLANO'		=>		$user['plano']
		);
		// $retorno = $user['nome'];
	// }catch(Exception $e){
	// 	$retorno = 'N';
	// }

	echo json_encode($retorno);
?>
