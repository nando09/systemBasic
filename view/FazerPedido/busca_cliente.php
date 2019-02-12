<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	try{
		if ($tipo == 'saida') {

			$query = $db->query("SELECT ID, EMPRESA, EMAIL, TELEFONE FROM CLIENTE WHERE ID = " . $id);

			foreach ($query as $key) {
				$nome = $key['empresa'];
			}
		}else{
			$query = $db->query("SELECT ID, EMPRESA, EMAIL, TELEFONE FROM FORNECEDOR WHERE ID = " . $id);

			foreach ($query as $key) {
				$nome = $key['empresa'];
			}
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

