<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];

		$query = $db->query("SELECT DATA_ULTIMA_COMPRA, NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE FROM CLIENTE WHERE ID = " . $id);

		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'nome' => $key['nome'],
						'data_ultima' => $key['data_ultima_compra'],
						'empresa' => $key['empresa'],
						'cnpj' => $key['cnpj'],
						'localidade' => $key['localidade'],
						'email' => $key['email'],
						'telefone' => $key['telefone']
			);
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

	echo json_encode($retorno);
?>
