<?php

	$retorno = "";
	$labels = array();
	$datas = array();
	// Primeirohttp://localhost/System/systemBasic/Clientes#relatorio em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		// $query = $db->query("SELECT ID, NOME FROM categoria");
		$query = $db->query("SELECT SUM(P.QUANTIDADE) AS QUANTIDADE, F.EMPRESA AS EMPRESA FROM FORNECEDOR AS F FULL OUTER JOIN FORNECENDO AS P ON P.ID_FORNECEDOR = F.ID GROUP BY F.EMPRESA, F.DATA_ULTIMA_COMPRA ORDER BY F.DATA_ULTIMA_COMPRA LIMIT 5");

		foreach ($query as $key) {
			array_push($labels, $key['empresa']);
			array_push($datas, $key['quantidade']);
			// $labels .= '"' . $key['produto'] . '",';
			// $datas .= $key['quantidade'] . ",";
		}

		// $labels .= "]";
		// $datas .= "]";

		// $labels = str_replace(",]", "]", $labels);
		// $datas = str_replace(",]", "]", $datas);

		// print_r($labels);
		// print_r($datas);
		// exit();

		$retorno = array(
			'labels' => $labels,
			'datas' => $datas
		);

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
