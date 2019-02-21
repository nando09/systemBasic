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

		$query = $db->query("SELECT C.EMPRESA AS EMPRESA, C.EMAIL AS EMAIL, C.TELEFONE AS TELEFONE FROM PEDINDO AS P
				INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
				INNER JOIN CLIENTE AS C ON P.ID_CLIENTE = C.ID
				WHERE PR.ID = " . $id);

		foreach ($query as $key) {
			$retorno .= "<tr>".
							"<td>". $key['empresa'] . "</td>".
							"<td>". $key['email'] ."</td>".
						"</tr>";
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
