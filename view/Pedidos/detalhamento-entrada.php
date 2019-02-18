<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];
		$query = "SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, C.DATA_ULTIMA_COMPRA AS ULTIMA, D.VENCIMENTO as VENCIMENTO, D.STATUS AS STATUS FROM DETALHE_FORNECEDOR AS D INNER JOIN FORNECEDOR AS C ON D.ID_FORNECEDOR = C.ID WHERE D.ID = " . $id;
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
