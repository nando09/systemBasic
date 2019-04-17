<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	try{
		$id_produto = $_POST['id_produto'];
		$id_cf = $_POST['id_cf'];
		$tipo = $_POST['tipo'];
		$finalizado = $_POST['finalizado'];

		if (empty($finalizado)) {
			if ($tipo == 'Cliente') {
				if ($db->query("DELETE FROM PEDINDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_CLIENTE = ". $id_cf . " AND FINALIZADO = 'NAO'")) {
					$retorno = 'S';
				}
			}else{
				if ($db->query("DELETE FROM FORNECENDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_FORNECEDOR = ". $id_cf . " AND FINALIZADO = 'NAO'")) {
					$retorno = 'S';
				}
			}
		}else{
			if ($tipo == 'Cliente') {
				if ($db->query("DELETE FROM PEDINDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_CLIENTE = ". $id_cf . " AND FINALIZADO = 'SIM'")) {
					

					if () {

					}
					$retorno = 'S';
				}
			}else{
				if ($db->query("DELETE FROM FORNECENDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_FORNECEDOR = ". $id_cf . " AND FINALIZADO = 'SIM'")) {
					$retorno = 'S';
				}
			}
		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
