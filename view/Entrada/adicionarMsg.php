<?php
	// Primeiro em php.ini temos que descomentar line pdo_psql

	$retorno = array(
		'retorno' => ''
	);

	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$descricao = '&&END' . $_POST['descricao'];
		$id = $_POST['id'];

		// print_r($descricao . '/' . $id);

		$query = "UPDATE ENTRADAMENSAGEM SET MENSAGEM = MENSAGEM || :mensagem WHERE ID = :id";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':mensagem', $descricao, PDO::PARAM_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		// echo $id . "/";
		// echo $nome . "/";
		// echo $assunto . "/";
		// echo $descricao . "/";

		// if ($stmt->execute(array(':mensagem' => $descricao, ':id' => $id))) {
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
