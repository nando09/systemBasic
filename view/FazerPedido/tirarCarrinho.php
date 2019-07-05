<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

	function somarEstoque($produto_id, $qnt, $db){
		$updade_pedido = "UPDATE PRODUTO SET QUANTIDADE = QUANTIDADE + :quantidade WHERE ID = :id_produto";
		$up = $db->prepare($updade_pedido, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$up->bindParam(':quantidade', $qnt, PDO::PARAM_INT);
		$up->bindParam(':id_produto', $produto_id, PDO::PARAM_INT);
		$up->execute();
	}

	try{
		$id_produto 	= 	$_POST['id_produto'];
		$id_cf 			= 	$_POST['id_cf'];
		$tipo 			= 	$_POST['tipo'];
		$finalizado 	= 	$_POST['finalizado'] ?? '';
		$id_finalizado	= 	$_POST['id_finalizado'] ?? '';

		if (empty($finalizado)) {
			if ($tipo == 'Cliente') {

				$query = "SELECT QUANTIDADE, ID_PRODUTO FROM PEDINDO WHERE ID_CLIENTE = :id_cliente AND FINALIZADO = 'NAO'";
				$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$stmt->bindParam(':id_cliente', $id_cf, PDO::PARAM_INT);
				$stmt->execute();
				$product = $stmt->fetch();

				somarEstoque($product['id_produto'], $product['quantidade'], $db);

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

				$query = "SELECT QUANTIDADE, ID_PRODUTO FROM PEDINDO WHERE ID_CLIENTE = :id_cliente AND FINALIZADO = 'SIM' AND ID_DETALHE = :id_finalizado";
				$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$stmt->bindParam(':id_cliente', $id_cf, PDO::PARAM_INT);
				$stmt->bindParam(':id_finalizado', $id_finalizado, PDO::PARAM_INT);
				$stmt->execute();
				$product = $stmt->fetch();

				somarEstoque($product['id_produto'], $product['quantidade'], $db);

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
