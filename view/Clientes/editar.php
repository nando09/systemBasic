<?php

include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
$vai = $_POST['vai'];

$retorno = array('retorno' => '');
if ($vai == 'buscar') {
	try{
		$id = $_POST['id'];

		$query = $db->query("SELECT ID, NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, CEP FROM CLIENTE WHERE ID = " . $id);
		// die($query);
		foreach ($query as $key) {
			if (empty($key['localidade'])) {
				$retorno = array(
							'retorno'		=>	'S',
							'vai'			=>	$vai,
							'id_cliente'	=>	$key['id'],
							'nome'			=>	$key['nome'],
							'empresa'		=>	$key['empresa'],
							'cnpj'			=>	$key['cnpj'],
							'cep'			=>	'',
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
							'retorno'		=>	'S',
							'vai'			=>	$vai,
							'id_cliente'	=>	$key['id'],
							'nome'			=>	$key['nome'],
							'empresa'		=>	$key['empresa'],
							'cnpj'			=>	$key['cnpj'],
							'cep'			=>	$key['cep'],
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
		$cnpj = $_POST['cnpj'];

		// $vowels = array(".", "/", "-", " ");
		// $cnpj = str_replace($vowels, '', $_POST['cnpj']);

		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$cep = $_POST['cep'];
		$estado = $_POST['estado'];
		$Cidade = $_POST['cidade'];
		$Bairro = $_POST['bairro'];
		$Rua = $_POST['rua'];
		$Numero = $_POST['numero'];


		$endereco = $Rua . "&&END" . $Numero . "&&END" . $Bairro . "&&END" . $Cidade . "&&END" . $estado;

		$query = $db->query("UPDATE CLIENTE SET CEP = '". $cep ."', NOME = '". $nome ."',  EMPRESA = '". $empresa ."', CNPJ = '". $cnpj ."', LOCALIDADE = '". $endereco ."', EMAIL = '". $email ."', TELEFONE = '". $telefone ."' WHERE ID = " . $id);
		// die()

		if ($query) {
			$query = "SELECT ID, NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE FROM CLIENTE WHERE ID = " . $id;

			if ($campo = $db->query($query)) {
				foreach ($campo as $key) {
					$retorno = array(
								'retorno' 	=> 	'S',
								'empresa' 	=> 	$key['empresa'],
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
