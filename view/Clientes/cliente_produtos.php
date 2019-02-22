<?php

	$retorno = "";
	$id = $_POST['id'];

	// if ($_POST) {
	// 	print_r($_POST);
	// 	exit();
	// }
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT PR.NOME AS NOME, PR.VALOR AS VALOR FROM PEDINDO AS P
				INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
				INNER JOIN CLIENTE AS C ON P.ID_CLIENTE = C.ID
				WHERE C.ID = " . $id);

		foreach ($query as $key) {
			$retorno .= "<tr>".
							"<td>". $key['nome'] . "</td>".
							"<td>". $key['valor'] ."</td>".
						"</tr>";
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
