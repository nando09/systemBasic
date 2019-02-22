<?php

	$retorno = "";
	$labels = array();
	$datas = array();
	// Primeirohttp://localhost/System/systemBasic/FORNECEDORs#relatorio em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		// $query = $db->query("SELECT ID, NOME FROM categoria");
		$query = $db->query("SELECT C.NOME AS PRODUTO, SUM(PE.QUANTIDADE) AS QUANTIDADE
								FROM FORNECENDO AS PE
								INNER JOIN FORNECEDOR AS C ON C.ID = PE.ID_FORNECEDOR
								GROUP BY C.NOME  ORDER BY SUM(PE.QUANTIDADE) LIMIT 5");

		foreach ($query as $key) {
			array_push($labels, $key['produto']);
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
