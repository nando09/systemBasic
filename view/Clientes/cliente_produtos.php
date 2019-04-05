<?php

	$retorno = "";
	$id = $_POST['id'];

	// if ($_POST) {
	// 	print_r($_POST);
	// 	exit();
	// }
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT PR.ID, PR.NOME AS NOME, PR.VALOR AS VALOR, SUM(P.QUANTIDADE) AS QUANTIDADE, SUM(PR.VALOR * P.QUANTIDADE) AS VALOR_TOTAL FROM PEDINDO AS P
								INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
								INNER JOIN CLIENTE AS C ON P.ID_CLIENTE = C.ID
								WHERE C.ID = $id
								GROUP BY PR.NOME, PR.VALOR, PR.ID");

		foreach ($query as $key) {
			$valor = 'R$ ' . number_format($key['valor'], 2, ',', ' ');
			$valor_total = 'R$ ' . number_format($key['valor_total'], 2, ',', ' ');
			$retorno .= "<tr>".
							"<td>". $key['nome'] . "</td>".
							"<td>". $valor ."</td>".
							"<td>". $key['quantidade'] ."</td>".
							"<td>". $valor_total ."</td>".
						"</tr>";
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
