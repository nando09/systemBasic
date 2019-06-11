<?php
	session_start();
	$id = $_SESSION['id_usuario'];

	$retorno = array(
		'retorno' => ''
	);

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$nome = $_POST['nome'];
		$assunto = $_POST['assunto'];
		$descricao = $_POST['descricao'];

		$query = "INSERT INTO ASSUNTO (ID_RECEBENDO, ID_ENVIANDO, NOME, MENSAGEM) VALUES (:recebendo, :enviando, :assunto, :mensagem)";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':recebendo', $nome, PDO::PARAM_INT);
		$stmt->bindParam(':enviando', $id, PDO::PARAM_INT);
		$stmt->bindParam(':mensagem', $descricao, PDO::PARAM_INT);
		$stmt->bindParam(':assunto', $assunto, PDO::PARAM_INT);
		// echo "<pre>";
		// print_r($nome);
		// echo "<pre>";
		// echo "</pre>";
		// print_r($assunto);
		// echo "<pre>";
		// echo "</pre>";
		// print_r($descricao);
		// echo "</pre>";
		// echo "</pre>";
		// print_r($id);
		// echo "</pre>";
		// die($query);
		$stmt->execute();

		$query = "SELECT ID FROM ASSUNTO WHERE NOME = :assunto AND ID_RECEBENDO = :recebendo";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':assunto', $assunto, PDO::PARAM_INT);
		$stmt->bindParam(':recebendo', $nome, PDO::PARAM_INT);
		$stmt->execute();
		$user = $stmt->fetch();
		$id_assunto = $user['id'];

		$query = "INSERT INTO ENTRADAMENSAGEM (ASSUNTO, MENSAGEM, ENVIADO_POR) VALUES (:assunto, :mensagem, :por)";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':mensagem', $descricao, PDO::PARAM_INT);
		$stmt->bindParam(':assunto', $id_assunto, PDO::PARAM_INT);
		$stmt->bindParam(':por', $id, PDO::PARAM_INT);

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
