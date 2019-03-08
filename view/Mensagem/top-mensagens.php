<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	// try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
		$count = 0;
		$msg = '';

		// SE O PRODUTO CHEGOU NO MINIMO
		$query = "SELECT
					P.ID, P.NOME,
					(SELECT COUNT(*) FROM MENSAGEM AS M WHERE M.ID_DE = P.ID AND M.DE = 'PRODUTO' AND ID_DE = P.ID AND M.DESCRICAO = 1) AS JA
				FROM
					PRODUTO AS P
				WHERE P.QUANTIDADE < P.MINIMO";

		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetchAll();

		foreach ($user as $key) {
			if ($key['ja'] == 0) {
				// echo "<h1>" . $key['empresa'] . "</h1>";
				$msg = "INSERT INTO MENSAGEM (DE, ASSUNTO, DESCRICAO, DATA_MSG, ID_DE) VALUES ('PRODUTO', '". $key['nome'] ."', 1, NOW(), ". $key['id'] .");";
				$envia = $db->prepare($msg, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$envia->execute();
			}

			$count++;
		}



		// SE O CLIENTE COM VENCIMENTO DE PAGAMENTO E ENTREGA DE PRODUTO
		$query = "SELECT C.NOME, C.ID, (SELECT COUNT(*) FROM MENSAGEM AS M WHERE M.ID_DE = C.ID AND M.DE = 'CLIENTE' AND ID_DE = C.ID AND M.DESCRICAO = 2) AS JA FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID WHERE VENCIMENTO < NOW()";

		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetchAll();

		foreach ($user as $key) {
			if ($key['ja'] == 0) {
				// echo "<h1>" . $key['empresa'] . "</h1>";
				$msg = "INSERT INTO MENSAGEM (DE, ASSUNTO, DESCRICAO, DATA_MSG, ID_DE) VALUES ('CLIENTE', '". $key['nome'] ."', 2, NOW(), ". $key['id'] .");";
				$envia = $db->prepare($msg, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$envia->execute();

				$msg = "INSERT INTO MENSAGEM (DE, ASSUNTO, DESCRICAO, DATA_MSG, ID_DE) VALUES ('CLIENTE', '". $key['nome'] ."', 3, NOW(), ". $key['id'] .");";
				$envia = $db->prepare($msg, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$envia->execute();
			}

			$count++;
		}


		// SE JÁ FOI PAGO O PRODUTO
		$query = "SELECT F.NOME, F.ID, (SELECT COUNT(*) FROM MENSAGEM AS M WHERE M.ID_DE = F.ID AND M.DE = 'CLIENTE' AND ID_DE = F.ID AND M.DESCRICAO = 4) AS JA FROM DETALHE_FORNECEDOR AS D INNER JOIN FORNECEDOR AS F ON D.ID_FORNECEDOR = F.ID WHERE VENCIMENTO < NOW()";

		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetchAll();

		foreach ($user as $key) {
			if ($key['ja'] == 0) {
				// echo "<h1>" . $key['empresa'] . "</h1>";
				$msg = "INSERT INTO MENSAGEM (DE, ASSUNTO, DESCRICAO, DATA_MSG, ID_DE) VALUES ('FORNECEDOR', '". $key['nome'] ."', 4, NOW(), ". $key['id'] .");";
				$envia = $db->prepare($msg, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$envia->execute();
			}

			$count++;
		}


		// SE O CLIENTE NÃO COMPROU A 2 MESES
		$query = "SELECT NOME, ID, (SELECT COUNT(*) FROM MENSAGEM AS M WHERE M.ID_DE = C.ID AND M.DE = 'CLIENTE' AND ID_DE = C.ID AND M.DESCRICAO = 5) AS JA FROM CLIENTE AS C WHERE C.DATA_ULTIMA_COMPRA < NOW() - INTERVAL '2' MONTH";

		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetchAll();

		foreach ($user as $key) {
			if ($key['ja'] == 0) {
				// echo "<h1>" . $key['empresa'] . "</h1>";
				$msg = "INSERT INTO MENSAGEM (DE, ASSUNTO, DESCRICAO, DATA_MSG, ID_DE) VALUES ('CLIENTE', '". $key['nome'] ."', 5, NOW(), ". $key['id'] .");";
				$envia = $db->prepare($msg, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$envia->execute();
			}

			$count++;
		}

		$retorno = $count;
	// }catch(Exception $e){
	// 	$retorno = 'N';
	// }

	echo json_encode($retorno);
?>

