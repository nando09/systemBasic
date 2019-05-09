<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	// try{
		$id_cf = $_POST['id_cf'];
		$tipo = $_POST['tipo'];
		$vencimento = $_POST['vencimento'];
		$status = $_POST['status'];

		if ($tipo == 'Cliente') {
			$query = "SELECT SUM(P.VALOR * PE.QUANTIDADE) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.FINALIZADO = 'NAO' AND PE.ID_CLIENTE = " . $id_cf;
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
				// $query = "SELECT ID_PRODUTO, QUANTIDADE FROM PEDINDO WHERE PE.FINALIZADO = 'NAO' AND PE.ID_CLIENTE = " . $id_cf;
				// $stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				// $stmt->execute();

				// $user = $stmt->fetchAll();
				// foreach ($user as $key) {
				// 	$updade_pedido = "UPDATE PRODUTO SET QUANTIDADE = QUANTIDADE - :quantidade WHERE ID = :id";
				// 	$up = $db->prepare($updade_pedido, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				// 	$up->bindParam(':quantidade', $key['quantidade'], PDO::PARAM_INT);
				// 	$up->bindParam(':id', $key['id_produto'], PDO::PARAM_INT);
				// 	$up->execute();
				// }


				$retorno = 'C';
				$query = "SELECT ID FROM DETALHE_PEDIDO WHERE ID_CLIENTE = $id_cf AND VALOR = $valor AND VENCIMENTO = '$vencimento' AND STATUS = '$status'";
				$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$stmt->execute();
				$sum = $stmt->fetch();
				$id_detalhe = $sum['id'];

				$updade_pedido = "UPDATE PEDINDO SET FINALIZADO = 'SIM', ID_DETALHE = ". $id_detalhe ." WHERE ID_CLIENTE = " . $id_cf;
				$up = $db->prepare($updade_pedido, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$up->execute();
			}
		}else{
			$query = "SELECT SUM(P.VALOR * F.QUANTIDADE) AS VALOR FROM FORNECENDO AS F INNER JOIN PRODUTO AS P ON P.ID = F.ID_PRODUTO WHERE F.FINALIZADO = 'NAO' AND F.ID_FORNECEDOR = " . $id_cf;
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
				$retorno = 'F';
				$query = "SELECT ID FROM DETALHE_FORNECEDOR WHERE ID_FORNECEDOR = $id_cf AND VALOR = $valor AND VENCIMENTO = '$vencimento' AND STATUS = '$status'";
				$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$stmt->execute();
				$sum = $stmt->fetch();
				$id_detalhe = $sum['id'];

				$db->query("UPDATE FORNECENDO SET FINALIZADO = 'SIM', ID_DETALHE = ". $id_detalhe ." WHERE ID_FORNECEDOR = " . $id_cf);
			}
		}

	// }catch(Exception $e){
	// 	$retorno = 'N';
	// }

	echo json_encode($retorno);
