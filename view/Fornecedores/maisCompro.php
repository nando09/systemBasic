<?php

	$retorno = "";
	$labels = array();
	$datas = array();
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		// $query = $db->query("SELECT ID, NOME FROM categoria");
		$query = $db->query("SELECT F.EMPRESA AS EMPRESA, SUM(PE.QUANTIDADE) AS QUANTIDADE
								FROM FORNECENDO AS PE
								INNER JOIN FORNECEDOR AS F ON F.ID = PE.ID_FORNECEDOR
								GROUP BY F.EMPRESA  ORDER BY SUM(PE.QUANTIDADE) DESC LIMIT 5");

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
