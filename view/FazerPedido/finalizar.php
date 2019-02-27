<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	// try{
		$id_cf = $_POST['id_cf'];
		$tipo = $_POST['tipo'];
		$vencimento = $_POST['vencimento'];
		$status = $_POST['status'];

		if ($tipo == 'Cliente') {
			$query = "SELECT SUM(P.VALOR * PE.QUANTIDADE) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.ID_CLIENTE = " . $id_cf;
			$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$stmt->execute();
			$sum = $stmt->fetch();
			$valor = $sum['valor'];
			// print_r($sum);
			// exit();

			$insert = "INSERT INTO DETALHE_PEDIDO (ID_CLIENTE, VALOR, DATA_COMPRA, VENCIMENTO, STATUS) VALUES ( ". $id_cf .", ". $valor .", NOW(), '". $vencimento ."', '". $status ."')";
			// print_r($insert);
			// exit();

			$retorno = $db->prepare($insert, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));



			if ($retorno->execute()) {
				$retorno = 'S';
				$db->query("UPDATE PEDINDO SET FINALIZADO = 'SIM' WHERE ID_CLIENTE = " . $id_cf);
			}
		}else{
			$query = "SELECT SUM(P.VALOR * F.QUANTIDADE) AS VALOR FROM FORNECENDO AS F INNER JOIN PRODUTO AS P ON P.ID = F.ID_PRODUTO WHERE F.ID_FORNECEDOR = " . $id_cf;
			$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$stmt->execute();
			$sum = $stmt->fetch();
			$valor = $sum['valor'];
			// print_r($sum);
			// exit();

			$insert = "INSERT INTO DETALHE_FORNECEDOR (ID_FORNECEDOR, VALOR, DATA_COMPRA, VENCIMENTO, STATUS) VALUES ( ". $id_cf .", ". $valor .", NOW(), '". $vencimento ."', '". $status ."')";
			// print_r($insert);
			// exit();
			$retorno = $db->prepare($insert, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

			if ($retorno->execute()) {
				$retorno = 'S';
				$db->query("UPDATE FORNECENDO SET FINALIZADO = 'SIM' WHERE ID_FORNECEDOR = " . $id_cf);
			}
		}

	// }catch(Exception $e){
	// 	$retorno = 'N';
	// }

	echo json_encode($retorno);
