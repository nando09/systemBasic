<?php

	$retorno = "";
	$id = $_POST['id'];

	$table = $_POST['table'];
	$inner = $_POST['inner'];
	$campo = $_POST['campo'];

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT PR.NOME AS NOME, PR.VALOR AS VALOR, SUM(P.QUANTIDADE) AS QUANTIDADE, SUM(PR.VALOR * P.QUANTIDADE) AS VALOR_TOTAL FROM $table AS P INNER JOIN $inner AS D ON P.$campo = D.ID INNER JOIN PRODUTO AS PR ON P.ID_PRODUTO = PR.ID WHERE D.ID = $id GROUP BY PR.NOME, PR.VALOR");
		// print_r($query);
		// exit();

		// $query = $db->query("SELECT PR.NOME AS NOME, PR.VALOR AS VALOR, SUM(P.QUANTIDADE) AS QUANTIDADE, SUM(PR.VALOR * P.QUANTIDADE) AS VALOR_TOTAL FROM $table AS P INNER JOIN $inner AS D ON P.$campo = D.ID INNER JOIN PRODUTO AS PR ON P.ID_PRODUTO = PR.ID WHERE D.ID = 46 GROUP BY PR.NOME, PR.VALOR");

		foreach ($query as $key) {
			$valor = 'R$ ' . number_format($key['valor'], 2, ',', ' ');
			$valor_total = 'R$ ' . number_format($key['valor_total'], 2, ',', ' ');

			$retorno .= "<tr>".
							"<td>". $key['nome'] . "</td>".
							"<td>". $valor . "</td>".
							"<td>". $key['quantidade'] . "</td>".
							"<td>". $valor_total . "</td>".
						"</tr>";
		}
		// exit();
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
