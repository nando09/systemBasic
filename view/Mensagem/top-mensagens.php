<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	// try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
		$count = 0;
		$msg = '';
		// $query = $db->query("SELECT ID, EMPRESA, EMAIL, TELEFONE FROM CLIENTE");
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


		$retorno = $count;
	// }catch(Exception $e){
	// 	$retorno = 'N';
	// }

	echo json_encode($retorno);
?>

