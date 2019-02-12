<?php

	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT ID, EMPRESA, EMAIL, TELEFONE FROM CLIENTE WHERE ID = " . $id);

		foreach ($query as $key) {
			$nome = $key['empresa'];
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

