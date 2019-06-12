<?php
	session_start();

	$id = $_SESSION['id_usuario'];
	$acessos = $_SESSION['acessos'] ?? '0';
	$arraysAcesso = explode("/", $acessos);

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$acesso = in_array('0', $arraysAcesso) ? true : false;


		if ($acesso) {
			$query = "SELECT
						A.ID AS ID,
						U.NOME AS RECEBENDO,
						S.NOME AS ENVIANDO,
						A.NOME AS ASSUNTO,
						A.MENSAGEM AS MENSAGEM
					FROM
						ASSUNTO AS A
					INNER JOIN
						USUARIO AS U
					ON
						A.ID_RECEBENDO = U.ID
					INNER JOIN
						USUARIO AS S
					ON
						A.ID_ENVIANDO = S.ID";
		}else{
			$query = "SELECT
						A.ID AS ID,
						U.NOME AS RECEBENDO,
						S.NOME AS ENVIANDO,
						A.NOME AS ASSUNTO,
						A.MENSAGEM AS MENSAGEM
					FROM
						ASSUNTO AS A
					INNER JOIN
						USUARIO AS U
					ON
						A.ID_RECEBENDO = U.ID
					INNER JOIN
						USUARIO AS S
					ON
						A.ID_ENVIANDO = S.ID
					WHERE
						A.ID_RECEBENDO = " . $id . "
					OR
						A.ID_ENVIANDO = " . $id;
		}

		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetchAll();
		foreach ($user as $key) {
			$retorno .= "
			<tr data-toggle='modal' data-target='.modal-mensagem'>
				<td>". $key['enviando'] ."</td>
				<td>". $key['recebendo'] ."</td>
				<td class='text-center'>". $key['assunto'] ."</td>
				<td title='". $key['mensagem'] ."' class='big-text'>". $key['mensagem'] ."</td>
				<td id='id' class='none'>". $key['id'] ."</td>
			</tr>";
		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
