<?php

	function situacaoCor($situacao){
		if ($situacao) {
			return 'vermelho';
		}else{
			return 'azul';
		}
	}

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = "SELECT
					P.ID AS ID,
					U.NOME AS NOME,
					P.DESCRICAO AS DESCRICAO,
					to_char(P.DETERMINADO, 'DD/MM/YYYY') AS DETERMINADO,
					P.FEITO AS FEITO,
					(P.DETERMINADO <= NOW()) as situacao
				FROM
					PROJETOS AS P
				INNER JOIN
					USUARIO AS U
				ON
					P.ID_USER = U.ID";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetchAll();
		foreach ($user as $key) {
			$cor = ($key['feito'] == 'SIM') ? 'verde' : situacaoCor($key['situacao']);
			$retorno .= "
			<tr>
				<td>". $key['nome'] ."</td>
				<td title='". $key['descricao'] ."' class='big-text'>". $key['descricao'] ."</td>
				<td class='text-center'>". $key['determinado'] ."</td>
				<td class='text-center ". $cor ."'>". $key['feito'] ."</td>
			</tr>";
		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
