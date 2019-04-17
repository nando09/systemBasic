<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	try{
		$id_produto = $_POST['id_produto'];
		$id_cf = $_POST['id_cf'];
		$tipo = $_POST['tipo'];
		$finalizado = $_POST['finalizado'] ?? '';

		if (empty($finalizado)) {
			if ($tipo == 'Cliente') {
				if ($db->query("DELETE FROM PEDINDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_CLIENTE = ". $id_cf . " AND FINALIZADO = 'NAO'")) {
					$retorno = 'S';
				}
			}else{
				if ($db->query("DELETE FROM FORNECENDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_FORNECEDOR = ". $id_cf . " AND FINALIZADO = 'NAO'")) {
					$retorno = 'S';
				}
			}
		}else{
			if ($tipo == 'Cliente') {
				if ($db->query("DELETE FROM PEDINDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_CLIENTE = ". $id_cf . " AND FINALIZADO = 'SIM'")) {

					$query = "SELECT SUM(P.VALOR * PE.QUANTIDADE) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.FINALIZADO = 'SIM' AND PE.ID_DETALHE = " . $finalizado;
					$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
					$stmt->execute();
					$sum = $stmt->fetch();
					$valor = $sum['valor'];

					$update = "UPDATE DETALHE_PEDIDO SET VALOR = " . $valor . " WHERE ID = " . $finalizado;
					$retorno = $db->prepare($update, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
					$retorno->execute();

					$retorno = 'S';
				}
			}else{
				if ($db->query("DELETE FROM FORNECENDO WHERE ID_PRODUTO = ". $id_produto ." AND ID_FORNECEDOR = ". $id_cf . " AND FINALIZADO = 'SIM'")) {

					$query = "SELECT SUM(P.VALOR * F.QUANTIDADE) AS VALOR FROM FORNECENDO AS F INNER JOIN PRODUTO AS P ON P.ID = F.ID_PRODUTO WHERE F.FINALIZADO = 'SIM' AND F.ID_DETALHE = " . $finalizado;
					$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
					$stmt->execute();
					$sum = $stmt->fetch();
					$valor = $sum['valor'];

					$update = "UPDATE DETALHE_FORNECEDOR SET VALOR = " . $valor . " WHERE ID = " . $finalizado;
					$retorno = $db->prepare($update, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
					$retorno->execute();

					$retorno = 'S';
				}
			}
		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
