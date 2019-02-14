<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	try{
		$id_cf = $_POST['id_cf'];
		$tipo = $_POST['tipo'];

		if (strpos($tipo, 'liente')) {
			if ($query = $db->query("SELECT COUNT(*) as NUMERO FROM PEDINDO WHERE ID_CLIENTE = " . $id_cf)) {
				foreach ($query as $key) {
					$retorno = array(
								'retorno' => 'S',
								'nro' => $key['numero']
					);
				}
			}
		}else{
			if ($query = $db->query("SELECT COUNT(*) as NUMERO FROM FORNECENDO WHERE ID_FORNECEDOR = " . $id_cf)) {
				foreach ($query as $key) {
					$retorno = array(
								'retorno' => 'S',
								'tipo' => $tipo,
								'nro' => $key['numero']
					);
				}
			}
		}

	}catch(Exception $e){
		$retorno = array(
					'retorno' => 'N'
		);
	}

	echo json_encode($retorno);
