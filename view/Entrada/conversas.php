<?php
	session_start();
	$id = $_SESSION['id_usuario'];

	$retorno = array(
		'retorno' => ''
	);

	// $tr = '';

	// // Primeiro em php.ini temos que descomentar line pdo_psql
	// try{
	// 	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	// 	$nome = $_POST['id'];

	// 	$query = "SELECT
	// 					E.ID AS ID,
	// 					U.NOME AS RECEBENDO,
	// 					S.NOME AS ENVIANDO,
	// 					E.ASSUNTO AS ASSUNTO,
	// 					E.MENSAGEM AS MENSAGEM,
	// 					E.LIDA AS LIDA
	// 				FROM
	// 					ENTRADAMENSAGEM AS E
	// 				INNER JOIN
	// 					USUARIO AS U
	// 				ON
	// 					E.ID_RECEBENDO = U.ID
	// 				INNER JOIN
	// 					USUARIO AS S
	// 				ON
	// 					E.ID_ENVIANDO = S.ID";

	// 	$mensagem = explode("&&END", $key['mensagem']);

	// 	$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	// 	$stmt->bindParam(':recebendo', $nome, PDO::PARAM_INT);
	// 	$stmt->bindParam(':enviando', $id, PDO::PARAM_INT);
	// 	$stmt->bindParam(':mensagem', $descricao, PDO::PARAM_INT);
	// 	$stmt->bindParam(':assunto', $assunto, PDO::PARAM_INT);

	// 	// echo $id . "/";
	// 	// echo $nome . "/";
	// 	// echo $assunto . "/";
	// 	// echo $descricao . "/";

	// 	if ($stmt->execute()) {
	// 		$retorno = array(
	// 			'retorno' => 'S'
	// 		);
	// 	}

	// }catch(Exception $e){
	// 	$retorno = array(
	// 		'retorno' => 'N'
	// 	);
	// }

	echo json_encode($retorno);
