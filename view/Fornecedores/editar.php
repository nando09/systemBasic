<?php

include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
$vai = $_POST['vai'];

$retorno = array('retorno' => '');
if ($vai == 'buscar') {
	try{
		$id = $_POST['id'];

		$query = $db->query("SELECT ID, NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE FROM FORNECEDOR WHERE ID = " . $id);
		// die($query);
		foreach ($query as $key) {
			if (empty($key['localidade'])) {
				$retorno = array(
					'retorno' => 'S',
					'vai' => $vai,
					'id_fornecedor' => $key['id'],
					'nome' => $key['nome'],
					'empresa' => $key['empresa'],
					'cnpj' => $key['cnpj'],
					'Rua'			=>	'',
					'Numero'		=>	'',
					'Bairro'		=>	'',
					'Cidade'		=>	'',
					'Estado'		=>	'',
					'email'			=>	$key['email'],
					'telefone'		=>	$key['telefone']
				);
			}else{
				$end = explode("&&END", $key['localidade']);

				$retorno = array(
					'retorno' => 'S',
					'vai' => $vai,
					'id_fornecedor' => $key['id'],
					'nome' => $key['nome'],
					'empresa' => $key['empresa'],
					'cnpj' => $key['cnpj'],
					'Rua'			=>	$end[0],
					'Numero'		=>	$end[1],
					'Bairro'		=>	$end[2],
					'Cidade'		=>	$end[3],
					'Estado'		=>	$end[4],
					'email'			=>	$key['email'],
					'telefone'		=>	$key['telefone']
				);
			}
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}
}else{
	try{
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$empresa = $_POST['empresa'];

		$vowels = array(".", "/", "-", " ");
		$cnpj = str_replace($vowels, '', $_POST['cnpj']);

		$email = $_POST['email'];
		$telefone = $_POST['telefone'];

		$estado = $_POST['estado'];
		$Cidade = $_POST['cidade'];
		$Bairro = $_POST['bairro'];
		$Rua = $_POST['rua'];
		$Numero = $_POST['numero'];


		$endereco = $Rua . "&&END" . $Numero . "&&END" . $Bairro . "&&END" . $Cidade . "&&END" . $estado;

		$query = $db->query("UPDATE FORNECEDOR SET NOME = '". $nome ."',  EMPRESA = '". $empresa ."', CNPJ = ". $cnpj .", LOCALIDADE = '". $endereco ."', EMAIL = '". $email ."', TELEFONE = '". $telefone ."' WHERE ID = " . $id);

		if ($query) {
			$query = "SELECT ID, NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE FROM FORNECEDOR WHERE ID = " . $id;

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
