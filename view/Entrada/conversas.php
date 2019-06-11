<?php
	session_start();
	$id = $_SESSION['id_usuario'];

	$retorno = array(
		'retorno' => ''
	);

	$p = '';

	// // Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$nome		=	$_POST['id'];
		// print_r($nome);
		$query = "SELECT
						E.ID AS ID,
						U.NOME AS RECEBENDO,
						A.ID_ENVIANDO AS EU,
						E.ENVIADO_POR AS ENVIADO_POR,
						S.NOME AS ENVIANDO,
						E.ASSUNTO AS ASSUNTO,
						E.MENSAGEM AS MENSAGEM,
						E.LIDA AS LIDA
					FROM
						ASSUNTO AS A
					INNER JOIN
						ENTRADAMENSAGEM AS E
					ON
						E.ASSUNTO = A.ID
					INNER JOIN
						USUARIO AS U
					ON
						A.ID_RECEBENDO = U.ID
					INNER JOIN
						USUARIO AS S
					ON
						A.ID_ENVIANDO = S.ID
					WHERE E.ASSUNTO = :id";

		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->bindParam(':id', $nome, PDO::PARAM_INT);

		// print_r($nome);

		if ($stmt->execute()) {
			$user = $stmt->fetchAll();

			foreach ($user as $key) {
				if ($key['enviado_por'] == $key['eu']) {
					$lado = 'right';
				}else{
					$lado = 'left';
				}

				$p .= "<p class='". $lado ." mensagem-box'>". $key['mensagem'] ."</p>";
			}

			$retorno = array(
				'retorno'	=>	'S',
				'p'			=>	$p
			);
		}

	}catch(Exception $e){
		$retorno = array(
			'retorno' => 'N'
		);
	}

	echo json_encode($retorno);
