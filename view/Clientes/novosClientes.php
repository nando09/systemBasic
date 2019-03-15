<?php

	$retorno = "";
	$labels = array();
	$datas = array();
	// Primeirohttp://localhost/System/systemBasic/Clientes#relatorio em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT EMPRESA, DATA_ULTIMA_COMPRA FROM CLIENTE AS C ORDER BY DATA_ULTIMA_COMPRA LIMIT 5");

		foreach ($query as $key) {
			// $data1 = new DateTime();
			// $data2 = new DateTime($key['DATA_ULTIMA_COMPRA']);

			// $data1 = new DateTime( '2013-12-11' );
			// $data2 = new DateTime( '1994-04-17' );

			$database = date_create($key['data_ultima_compra']);
			$datadehoje = date_create();
			$resultado = date_diff($database, $datadehoje);
			$dias = date_interval_format($resultado, '%a');

			// $data1 = new DateTime( '2013-12-11' );
			// $data2 = new DateTime($key['data_ultima_compra']);

			// $intervalo = $data1->diff( $data2 );
			// $dias = $intervalo->d;

			// echo "Intervalo é de {$intervalo->y} anos, {$intervalo->m} meses e {$intervalo->d} dias";

			array_push($labels, $key['empresa']);
			array_push($datas, $dias);
			// array_push($datas, $key['data_ultima_compra']);
		}

		$retorno = array(
			'labels' => $labels,
			'datas' => $datas
		);

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
