<?php

include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
$vai = $_POST['vai'];

$retorno = array('retorno' => '');
if ($vai == 'buscar') {
	try{
		$id = $_POST['id'];

		$query = $db->query("SELECT ID, NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE FROM CLIENTE WHERE ID = " . $id);
		// die($query);
		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'vai' => $vai,
						'id_cliente' => $key['id'],
						'nome' => $key['nome'],
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
}else{
	try{
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$empresa = $_POST['empresa'];
		$cnpj = $_POST['cnpj'];
		$localidade = $_POST['localidade'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];

		$query = $db->query("UPDATE CLIENTE SET NOME = '". $nome ."',  EMPRESA = '". $empresa ."', CNPJ = ". $cnpj .", LOCALIDADE = '". $localidade ."', EMAIL = '". $email ."', TELEFONE = '". $telefone ."' WHERE ID = " . $id);
		// die()

		if ($query) {
			$query = "SELECT ID, NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE FROM CLIENTE WHERE ID = " . $id;

			if ($campo = $db->query($query)) {
				foreach ($campo as $key) {
					$retorno = array(
								'retorno' 	=> 	'S',
								'empresa' 	=> 	$key['empresa'],
								'email' 	=>	$key['email'],
								'telefone'	=> 	$key['telefone'],
					);
				}
			}
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

}

echo json_encode($retorno);
