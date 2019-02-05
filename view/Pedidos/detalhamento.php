<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];
		$query = "SELECT D.ID as ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, D.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS as STATUS, D.VENCIMENTO as VENCIMENTO, D.TEMPO AS TEMPO FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID WHERE D.ID = " . $id;
		// die($query);

		$query = $db->query($query);

		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'id' => $key['id'],
						'empresa' => $key['empresa'],
						'valor' => $key['valor'],
						'ultima' => $key['ultima'],
						'vencimento' => $key['vencimento'],
						'tempo' => $key['tempo'],
						'status' => $key['status']
			);
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

	echo json_encode($retorno);
?>
