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

		$nome = $_POST['id'];

		$query = "SELECT
						E.ID AS ID,
						U.NOME AS RECEBENDO,
						S.NOME AS ENVIANDO,
						E.ASSUNTO AS ASSUNTO,
						E.MENSAGEM AS MENSAGEM,
						E.LIDA AS LIDA
					FROM
						ENTRADAMENSAGEM AS E
					INNER JOIN
						USUARIO AS U
					ON
						E.ID_RECEBENDO = U.ID
					INNER JOIN
						USUARIO AS S
					ON
						E.ID_ENVIANDO = S.ID";

		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

		if ($stmt->execute()) {
			$user = $stmt->fetch();

			$mensagem = explode("&&END", $user['mensagem']);
			$mensagem = array_reverse($mensagem);

			foreach ($mensagem as $key => $value) {
				$lado = !($key % 2) ? 'left' : 'right';
				$p .= "<p class='" . $lado . " mensagem-box'>". $value ."</p>";
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
