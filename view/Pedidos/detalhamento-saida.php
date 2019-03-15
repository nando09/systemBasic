<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];
		$query = "SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, to_char(C.DATA_ULTIMA_COMPRA, 'DD/MM/YYYY') AS ULTIMA, to_char(D.VENCIMENTO, 'DD/MM/YYYY') as VENCIMENTO, D.STATUS AS STATUS FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID WHERE D.ID = " . $id;
		// die($query);

		$pedido = $db->query($query);

		foreach ($pedido as $key) {
			$retorno = array(
						'retorno' => 'S',
						'id' => $key['id'],
						'empresa' => $key['empresa'],
						'valor' => $key['valor'],
						'ultima' => $key['ultima'],
						'vencimento' => $key['vencimento'],
						'status' => $key['status']
			);
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

	echo json_encode($retorno);
?>
