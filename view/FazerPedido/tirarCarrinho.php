<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	try{
		$id_produto = $_POST['id_produto'];
		$id_cf = $_POST['id_cf'];
		$quantidade = $_POST['quantidade'];
		$tipo = $_POST['tipo'];

		if ($tipo == 'Cliente') {
			if ($db->query("DELETE FROM PEDINDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_CLIENTE = ". $id_cf)) {
				$retorno = 'S';
			}
		}else{
			if ($db->query("DELETE FROM FORNECENDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_FORNECEDOR = ". $id_cf)) {
				$retorno = 'S';
			}
		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
