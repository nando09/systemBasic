<?php
	session_start();
	$id = $_SESSION['id_usuario'];

	$retorno = array(
		'retorno' => ''
	);

	$tr = '';

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$nome = $_POST['nome'];
		$assunto = $_POST['assunto'];
		$descricao = $_POST['descricao'];

		$query = "INSERT INTO ENTRADAMENSAGEM (ID_RECEBENDO, ID_ENVIANDO, ASSUNTO, MENSAGEM) VALUES (:recebendo, :enviando, :assunto, :mensagem)";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':recebendo', $nome, PDO::PARAM_INT);
		$stmt->bindParam(':enviando', $id, PDO::PARAM_INT);
		$stmt->bindParam(':mensagem', $descricao, PDO::PARAM_INT);
		$stmt->bindParam(':assunto', $assunto, PDO::PARAM_INT);

		// echo $id . "/";
		// echo $nome . "/";
		// echo $assunto . "/";
		// echo $descricao . "/";

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
