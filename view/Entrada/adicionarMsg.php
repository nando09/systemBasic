<?php
	// Primeiro em php.ini temos que descomentar line pdo_psql
	session_start();
	$id = $_SESSION['id_usuario'];

	$retorno = array(
		'retorno' => ''
	);

	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$assunto			=	$_POST['id'];
		$descricao	=	$_POST['descricao'];

		// print_r($descricao . '/' . $assunto);

		$query = "INSERT INTO ENTRADAMENSAGEM (ASSUNTO, MENSAGEM, ENVIADO_POR) VALUES (:assunto, :mensagem, :por)";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':mensagem', $descricao, PDO::PARAM_INT);
		$stmt->bindParam(':assunto', $assunto, PDO::PARAM_INT);
		$stmt->bindParam(':por', $id, PDO::PARAM_INT);

		// echo $assunto . "/";
		// echo $nome . "/";
		// echo $assunto . "/";
		// echo $descricao . "/";

		// if ($stmt->execute(array(':mensagem' => $descricao, ':id' => $assunto))) {
		if ($stmt->execute()) {
			$retorno = array(
				'retorno' => 'S'
			);
		}

	}catch(Exception $e){
		$retorno = array(
			'retorno' => 'N'
		);
	}

	echo json_encode($retorno);
