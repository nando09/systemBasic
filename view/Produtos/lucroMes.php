<?php

	$retorno = "";
	$labels = array();
	$datas = array();
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		// $query = $db->query("SELECT ID, NOME FROM categoria");
		$query = $db->query("SELECT extract(MONTH from D.VENCIMENTO) AS VENCIMENTO, SUM(P.QUANTIDADE) AS QUANTIDADE FROM DETALHE_PEDIDO AS D
								INNER JOIN PEDINDO AS P ON D.ID_CLIENTE = P.ID_CLIENTE
								INNER JOIN PRODUTO AS PR ON P.ID_PRODUTO = PR.ID
								WHERE EXTRACT(YEAR FROM D.VENCIMENTO) = 2019
								GROUP BY extract(MONTH from D.VENCIMENTO)
								ORDER BY VENCIMENTO
								");

		foreach ($query as $key) {
			$mes = mes($key['vencimento']);
			array_push($labels, $mes);
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

	function mes($num){
		switch ($num) {
			case 1:
				return 'Jan';
			case 2:
				return 'Fev';
			case 3:
				return 'Mar';
			case 4:
				return 'Abr';
			case 5:
				return 'Mai';
			case 6:
				return 'Jun';
			case 7:
				return 'Jul';
			case 8:
				return 'Ago';
			case 9:
				return 'Set';
			case 10:
				return 'Out';
			case 11:
				return 'Nov';
			case 12:
				return 'Dez';
			
		}
	}

	echo json_encode($retorno);
?>
