<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	try{
		$id_produto = $_POST['id_produto'];
		$id_cf = $_POST['id_cf'];
		$quantidade = $_POST['quantidade'];
		$tipo = $_POST['tipo'];

		if ($db->query("INSERT INTO PEDINDO (ID_PRODUTO, ID_CLIENTE, QUANTIDADE) VALUES (". $id_produto .", ". $id_cf .", ". $quantidade .")")) {
			$retorno = 'S';
		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
