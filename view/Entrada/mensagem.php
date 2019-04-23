<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

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
		$stmt->execute();
		$user = $stmt->fetchAll();
		foreach ($user as $key) {
			$cor = ($key['feito'] == 'SIM') ? 'verde' : situacaoCor($key['situacao']);
			$retorno .= "
			<tr>
				<td>". $key['enviando'] ."</td>
				<td>". $key['recebendo'] ."</td>
				<td class='text-center'>". $key['assunto'] ."</td>
				<td title='". $key['mensagem'] ."' class='big-text'>". $key['mensagem'] ."</td>
			</tr>";
		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>