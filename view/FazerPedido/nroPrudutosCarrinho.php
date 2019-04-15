<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	try{
		$id_cf = $_POST['id_cf'];
		$tipo = $_POST['tipo'];
		$finalizado = $_POST['finalizado'] ?? '';

		if (strpos($tipo, 'liente')) {
			if (empty($finalizado)) {
				$select = "SELECT COUNT(*) as NUMERO, SUM(P.VALOR * PE.QUANTIDADE) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.FINALIZADO = 'NAO' AND PE.ID_CLIENTE = " . $id_cf;
			}else{
				$select = "SELECT COUNT(*) as NUMERO, SUM(P.VALOR * PE.QUANTIDADE) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.FINALIZADO = 'SIM' AND PE.ID_DETALHE = " . $finalizado;
			}

			if ($query = $db->query($select)) {
				foreach ($query as $key) {
					$retorno = array(
								'retorno' => 'S',
								'nro' => $key['numero'],
								'valor' => $key['valor']
					);
				}
			}
		}else{

			if (empty($finalizado)) {
				$select = "SELECT COUNT(*) as NUMERO, SUM(P.VALOR * F.QUANTIDADE) AS VALOR FROM FORNECENDO AS F INNER JOIN PRODUTO AS P ON P.ID = F.ID_PRODUTO WHERE F.FINALIZADO = 'NAO' AND F.ID_FORNECEDOR = " . $id_cf;
			}else{
				$select = "SELECT COUNT(*) as NUMERO, SUM(P.VALOR * F.QUANTIDADE) AS VALOR FROM FORNECENDO AS F INNER JOIN PRODUTO AS P ON P.ID = F.ID_PRODUTO WHERE F.FINALIZADO = 'SIM' AND F.ID_DETALHE = " . $finalizado;
			}

			// die($select);

			if ($query = $db->query($select)) {
				foreach ($query as $key) {
					$retorno = array(
								'retorno' => 'S',
								'nro' => $key['numero'],
								'valor' => $key['valor']
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
